<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/6/20
 * Time: 14:41
 */

namespace app\room\model;
use app\room\controller\JsonTrait;
use app\room\model\Menu as MenuModel;

class Right extends Base
{
    protected $table = "pro_right";

    public static function getAllRights($page,$limit){
        $rights = self::with('pname')->page($page)->limit($limit)->order("id")->select();
        $count = count(self::all());
        return JsonTrait::TableData(0,'获取成功',$count,$rights);
    }

    public function pname()
    {
        return $this->hasOne('Menu','id','pid');
    }


    public static function addRight($data){
        $title = $data['title'];
        $name = $data['name'];
        $status = $data['status'];
        $id = $data['id'];
        $pid = $data['pid'];
        $level = $data['level'];
        if($id!='0'){
            $info = self::where('id',$id)->find();
        }else{
            $info = '';
        }
        if($info!==''){
            $result = self::where('id',$id)->update([
                'name' => $name,
                'title'=>$title,
                'status' => $status,
                'pid' =>$pid,
                'level'=>$level
            ]);
            if($result!==false){
                return JsonTrait::JsonData(200,'更新成功');
            }else{

                return JsonTrait::JsonData(401,'更新失败'.$result);
            }
        }else{
            $result = self::create([
                'name' => $name,
                'title'=>$title,
                'status' => $status,
                'pid' =>$pid,
                'level'=>$level
            ]);
            if($result!==false){
                return JsonTrait::JsonData(200,'添加成功');
            }else{
                return JsonTrait::JsonData(401,'添加失败');
            }
        }
    }

    public static function delRight($data){
        $id = $data['id'];
        $info = self::where('id',$id)->delete();
        if($info!==false){
            return JsonTrait::JsonData(200,'删除成功');
        }else{
            return JsonTrait::JsonData(401,'删除失败');
        }
    }
}