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

class Code extends Base
{
    protected $table = 'pro_code';


    public static function getCodeList($page,$limit)
    {
        $result = self::page($page)->limit($limit)->alias('a')->join('pro_type b','a.type = b.id')->field('a.*,b.typename')->order("a.id")->select();
        $count = count( self::select());
        if($result!==false){
            return JsonTrait::TableData(0,'获取成功',$count,$result);
        }else{
            return JsonTrait::JsonData(401,'保存失败');
        }
    }

    public static function addCode($data)
    {
        $codename = $data['codename'];
        $status = $data['status'];
        $typeid = $data['types'];
        $codeID = $data['codeID'];
        $id = $data['id'];
        if($id!='0'){
            $info = self::where('id',$id)->find();
        }else{
            $info = '';
        }
        if($info!==''){
            $hasType = self::where('id','<>',$id)->where("display",$codename)->find();
 ;
            if($hasType!=null){
                return JsonTrait::JsonData(401,'类型名称已存在，请重新添加');
            }else{
                $result = self::where('id',$id)->update([
                    'display' => $codename,
                    'status' => $status,
                    'type' => $typeid,
                    'codeID' => $codeID
                ]);
                return JsonTrait::JsonData(200,'更新成功');
            }

        }else{
            $hasType = self::where('id','<>',$id)->where("display",$codename)->find();
            if($hasType!=null){
                return JsonTrait::JsonData(401,'角色名称已存在，请重新添加');
            }else{
                $result = self::create([
                    'display' => $codename,
                    'status' => $status,
                    'type' => $typeid,
                    'codeID' => $codeID
                ]);
                return JsonTrait::JsonData(200,'添加成功');
            }

        }
    }

    public static function delCode($data)
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