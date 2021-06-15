<?php

namespace app\index\controller;

use app\room\model\Banners as BannersModel;

class Index extends Base
{
    public function index()
    {
        $banners = BannersModel::all();
        $this->assign('banners', $banners);
        return $this->fetch('index');
    }
}
