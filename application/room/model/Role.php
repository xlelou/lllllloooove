<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/5/6
 * Time: 17:03
 */

namespace app\room\model;
use app\room\controller\JsonTrait;
use app\room\model\RightAccess as RightAccessModel;

class Role extends Base
{
    protected $table = 'Pro_role';


    public static function getRoleList($page,$limit)
    {
        $result = self::page($page)->limit($limit)->order("id")->select();
        $count = count( self::select());
        if($result!==false){
            return JsonTrait::TableData(0,'获取成功',$count,$result);
        }else{
            return JsonTrait::JsonData(401,'保存失败');
        }
    }

    public static function getRight($id){
       $rightList = RightAccessModel::where('roleid',$id)->column("rightid");
        return $rightList;
    }



    public static function addRole($data)
    {
        $roleName = $data['rolename'];
        $status = $data['status'];
        $id = $data['id'];
        $right_ids = $data['rightid']?$data['rightid']:[];
        if($id!='0'){
            $info = self::where('id',$id)->find();
        }else{
            $info = '';
        }
        if($info!==''){
            $hasRole = self::where('id','<>',$id)->where("name",$roleName)->find();
 ;
            if($hasRole!=null){
                return JsonTrait::JsonData(401,'角色名称已存在，请重新添加');
            }else{
                $result = self::where('id',$id)->update([
                    'name' => $roleName,
                    'status' => $status
                ]);
                if($result!==false){
                    RightAccessModel::where("roleid",$id)->delete();
                    foreach ($right_ids as $right_id){
                        RightAccessModel::create([
                            'roleid'=>$id,
                            'rightid'=>$right_id
                        ]);
                    }
                    return JsonTrait::JsonData(200,'更新成功');
                }else{
                    return JsonTrait::JsonData(401,'更新失败');
                }
            }

        }else{
            $hasRole = self::where('id','<>',$id)->where("name",$roleName)->find();
            if($hasRole!=null){
                return JsonTrait::JsonData(401,'角色名称已存在，请重新添加');
            }else{
                $result = self::create([
                    'name' => $roleName,
                    'status' => $status,
                ]);
                if($result!==false){
                    foreach ($right_ids as $right_id){
                        RightAccessModel::create([
                            'roleid'=>$id,
                            'rightid'=>$right_id
                        ]);
                    }
                    return JsonTrait::JsonData(200,'添加成功');
                }else{
                    return JsonTrait::JsonData(401,'添加失败');
                }
            }

        }
    }
    public static function delRole($data)
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