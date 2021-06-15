<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/18
 * Time: 23:42
 */

namespace app\room\model;


use app\room\controller\JsonTrait;
use app\room\model\User as UserModel;
use app\room\model\RoleUser as RoleUserModel;

class User extends Base
{
    protected $table = 'pro_user';

    public function role()
    {
        return $this->hasOne('Role','id','roleid');
    }

    public static function getUser($id)
    {
        $user = self::where('id', $id)->find();
        return $user;
    }

    public static function getUserLists($page,$limit)
    {
        $users = self::with('role')->page($page)->limit($limit)->order('id asc')->select();
        $count = count(self::with('role')->select());
        return JsonTrait::TableData(0,'获取成功',$count,$users);
    }

    public static function getRole($id){
        $roleList = RoleUserModel::where('userid',$id)->column("roleid");
        return $roleList;
    }


    public static function addUser($data)
    {
        $username = $data['username'];
        $truename = $data['truename'];
        $age = $data['age'];
        $sex = $data['sex'];
        $tel = $data['phone'];
        $status = $data['status'];
        $id = $data['id'];
        $role_ids = $data['roleid']?$data['roleid']:[];
        if($id!='0'){
            $info = self::where('id',$id);
        }else{
            $info = '';
        }
        if($info!=''){
            $hasUser = self::where('id','<>',$id)->where("username",$username)->find();
            if($hasUser!==null){
                return JsonTrait::JsonData(401,'用户名已存在');
            }
            $result = self::where('id',$id)->update([
                'username' => $username,
                'nickname' => $truename,
                'age' => $age,
                'sex' => $sex,
                'tel' => $tel,
                'status' => $status,
            ]);
            if($result!==false){
                //更改用户角色表内容
                RoleUserModel::where('userid',$id)->delete();
                foreach ($role_ids as $role_id){
                    RoleUserModel::create([
                        'roleid'=>$role_id,
                        'userid'=>$id
                    ]);
                }
                return JsonTrait::JsonData(200,'更新成功');
            }else{
                return JsonTrait::JsonData(401,'更新失败');
            }
        }else{
            $hasUser = self::where('id','<>',$id)->where("username",$username)->find();
            if($hasUser!==null){
                return JsonTrait::JsonData(401,'用户名已存在');
            }
            $result = self::create([
                'username' => $username,
                'nickname' => $truename,
                'age' => $age,
                'sex' => $sex,
                'tel' => $tel,
                'status' => $status,
                'password' => md5(md5($username.'123456'))
            ]);
            $id = $result->getLastInsID();
            if($result!==false){
                //更改用户角色表内容
                foreach ($role_ids as $role_id){
                    RoleUserModel::create([
                        'roleid'=>$role_id,
                        'userid'=>$id
                    ]);
                }
                return JsonTrait::JsonData(200,'添加成功');
            }else{
                return JsonTrait::JsonData(401,'添加失败');
            }
        }

    }

    public static function delUser($data)
    {
        $id = $data['id'];
        $info = self::where('id',$id)->delete();
        if($info!==false){
            return JsonTrait::JsonData(200,'删除成功');
        }else{
            return JsonTrait::JsonData(401,'删除失败');
        }
    }
}