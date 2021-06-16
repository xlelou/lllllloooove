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

class Types extends Base
{
    protected $table = 'Pro_type';


    public static function getTypeList($page,$limit)
    {
        $result = self::page($page)->limit($limit)->order("id")->select();
        $count = count( self::select());
        if($result!==false){
            return JsonTrait::TableData(0,'获取成功',$count,$result);
        }else{
            return JsonTrait::JsonData(401,'保存失败');
        }
    }

    public static function addType($data)
    {
        $typename = $data['typename'];
        $status = $data['status'];
        $id = $data['id'];
        if($id!='0'){
            $info = self::where('id',$id)->find();
        }else{
            $info = '';
        }
        if($info!==''){
            $hasType = self::where('id','<>',$id)->where("typename",$typename)->find();
 ;
            if($hasType!=null){
                return JsonTrait::JsonData(401,'类型名称已存在，请重新添加');
            }else{
                $result = self::where('id',$id)->update([
                    'typename' => $typename,
                    'status' => $status
                ]);
                return JsonTrait::JsonData(200,'更新成功');
            }

        }else{
            $hasType = self::where('id','<>',$id)->where("typename",$typename)->find();
            if($hasType!=null){
                return JsonTrait::JsonData(401,'角色名称已存在，请重新添加');
            }else{
                $result = self::create([
                    'typename' => $typename,
                    'status' => $status,
                ]);
                return JsonTrait::JsonData(200,'添加成功');
            }

        }
    }

    public static function getTypes(){
        $getTypes = self::select();
         return $getTypes;
     }
 

    public static function delType($data)
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