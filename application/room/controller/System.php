<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/4/19
 * Time: 12:10
 */

namespace app\room\controller;

use app\room\model\Settings as SettingsModel;
use app\room\model\Admin as AdminModel;
class System extends Base
{
    public function index()
    {
        $settings = SettingsModel::getSettings();
        $this->assign('settings',$settings);
        return $this->fetch();
    }

    public function saveSettings()
    {
        $post = request()->instance()->post();
        return SettingsModel::saveSettings($post);
    }







}