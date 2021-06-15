<?php
namespace app\room\controller;

/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/18
 * Time: 22:53
 */
use app\room\model\Admin as AdminModel;


class Index extends Base
{
    public function loginPage()
    {
        return $this->fetch('login');
    }

    public function index()
    {
        return $this->fetch('index');
    }

    public function console()
    {
        return $this->fetch();
    }

    public function login()
    {
        $data = request()->instance()->post();
        $username = $data['username'];
        $password = MD5(MD5($data['username'].$data['password']));
        return AdminModel::checkLogin($username,$password);
    }

    public function loginOut()
    {
        session(null);
        return $this->fetch('login');
    }
}