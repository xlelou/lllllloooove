<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/19
 * Time: 17:19
 */

namespace app\room\model;
use app\room\controller\JsonTrait;

class Admin extends Base
{
    protected $table = 'pro_user';

    public static function getUser($id)
    {
        $user = self::where('id', $id)->find();
        return $user;
    }

    public static function checkLogin($username, $password)
    {
        $user = self::where('username', $username)->where('password', $password)->find();
        if (!empty($user)) {
            session('user',$user);
            session('time',time());
            return JsonTrait::JsonData(200, '登录成功');
        } else {
            return JsonTrait::JsonData(401, '登陆失败,用户名或密码错误');
        }

    }
}