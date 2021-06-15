<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/6/24
 * Time: 14:21
 */

namespace app\room\model;
use app\room\controller\JsonTrait ;

class Menu extends Base
{
    protected $table = 'pro_controller';

    public static function getController($page,$limit){
        $list = self::page($page)->limit($limit)->order('id asc')->select();
        $count = count(self::select());
        return JsonTrait::TableData(0,'获取成功',$count,$list);
    }

    public static function addController($data){
        $name = $data['name'];
        $sort = $data['sort'];
        $status = $data['status'];
        $id = $data['id'];
        if($id!='0'){
            $info = self::where('id',$id)->find();
        }else{
            $info = '';
        }
        if($info!==''){
            $hasRole = self::where('id','<>',$id)->where("name",$name)->find();
            ;
            if($hasRole!=null){
                return JsonTrait::JsonData(401,'角色名称已存在，请重新添加');
            }else{
                $result = self::where('id',$id)->update([
                    'name' => $name,
                    'status' =>$status,
                    'sort' => $sort
                ]);
                if($result!==false){
                    return JsonTrait::JsonData(200,'更新成功');
                }else{
                    return JsonTrait::JsonData(401,'更新失败');
                }
            }

        }else{
            $hasRole = self::where('id','<>',$id)->where("name",$name)->find();
            if($hasRole!=null){
                return JsonTrait::JsonData(401,'角色名称已存在，请重新添加');
            }else{
                $result = self::create([
                    'name' => $name,
                    'status' =>$status,
                    'sort' => $sort
                ]);
                if($result!==false){
                    return JsonTrait::JsonData(200,'添加成功');
                }else{
                    return JsonTrait::JsonData(401,'添加失败');
                }
            }

        }
    }
    public static function delMenu($data)
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