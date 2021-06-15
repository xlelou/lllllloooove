<?php
namespace app\room\controller;
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/18
 * Time: 22:53
 */
use app\room\model\RightAccess;
use think\Controller;
use app\room\model\Settings as SettingsModel;
use app\room\model\Role as RoleModel;
use app\room\model\User as UserModel;
use app\room\model\Right as RightModel;
class Base extends Controller
{
    protected $nowUrls = [];

    public function _initialize()
    {
        $user = session('user');
        $time = time();
        $flag = true;


        $settings = SettingsModel::get(1);
        $this->assign('sysSettings',$settings);

        $rights = [];
        $urls = [];
        if($user['username']!=='admin'){
            $roles = UserModel::getRole($user['id']);
            if(is_array($roles)){
                foreach ($roles as $v){
                    $right = RoleModel::getRight($v);
                    $rights = array_merge($rights,$right);
                }
            }
            foreach ($rights as $v){
                $url = RightModel::with('pname')->where('id',$v)->order('id asc')->select();
                $urls = array_merge($urls,$url);
                $nowUrl = RightModel::where('id',$v)->column('name');
                $this->nowUrls = array_merge($this->nowUrls,$nowUrl);
            }
            if(count($urls)>0){
                $this->assign('urls',json_encode($urls));
            }
        }else{
           $urls =  RightModel::with('pname')->select();
            $this->assign('urls',json_encode($urls));
        }
        $controller = request()->instance()->controller();
        $module = request()->instance()->module();
        $action = request()->instance()->action();
        $url="/".$module."/".$controller."/".$action;
        $url = stripslashes($url);

//        var_dump($url);
//        var_dump($this->nowUrls);
        if(($url == config('SystemSettings.loginPageUrl') || $url == config('SystemSettings.loginPost')) ){
            return true;
        }else{
            if((in_array($url,$this->nowUrls))){
                $flag = true;
            }else{
                $flag = false;
            }
        }
//        if($flag===true){
//            return true;
//        }else{
//            return $this->error("没有权限访问");
//        }
//

        if($time-session('time')>7200){
            session('user',null);
        }
        if($user!==null){
            $this->assign('user',$user);
        }else{
            return $this->redirect('/room/login',302);
        }

    }




}