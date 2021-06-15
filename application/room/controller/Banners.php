<?php
/**
 * Created by PhpStorm.
 * User: xlelou
 * Date: 2019/7/5
 * Time: 16:04
 */

namespace app\room\controller;
use app\room\model\Banners as BannersModel;
class Banners extends Base
{
    public  function frontUpload(){
        return $this->fetch('frontUploads');
    }

    public function bannerForm(){
        return $this->fetch('bannerForm');
    }

    public function addBanner(){
        $post = request()->instance()->post();
        return BannersModel::addBanners($post);
    }

    public function getBanners(){
        return BannersModel::getBanners();
    }

    public function delBanners(){
        $post = request()->instance()->post();
        return BannersModel::delBanners($post);
    }

}