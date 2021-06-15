<?php
namespace app\room\controller;

/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/18
 * Time: 22:53
 */
use app\room\model\Admin as AdminModel;


class Settings extends Base
{
    public function userSettings()
    {
        return $this->fetch('user/settings');
    }
}