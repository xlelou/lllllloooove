<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['Index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['Index/hello', ['method' => 'post']],
//    ],
//
//];

use think\Route;

// get  page
Route::get('/room/login','room/Index/loginPage'); //登录页面
Route::get('/room/index','room/Index/index');//后台首页
Route::get('/room/console','room/Index/console');//后台控制台
Route::get('/room/systemSetting','room/System/index');//设置页面
Route::get('/room/userSetting','room/settings/userSettings');//用户设置页面
Route::get('/room/role','room/role/index');//用户角色页面
Route::get('/room/roleform','room/role/roleform');//编辑用户角色页面
Route::get('/room/userform','room/user/userform');//编辑用户信息页面
Route::get('/room/right','room/right/index');//权限页面
Route::get('/room/rightform','room/right/rightform');//编辑权限页面
Route::get('/room/menuform','room/menu/menuform');//控制器编辑页面
Route::get('/room/frontUpolad','room/banners/frontUpload');//前端页面轮播图
Route::get('/room/bannerForm','room/banners/bannerForm');
Route::get('/room/code','room/code/index');


Route::get('/front/banners','index/banner/index');


// get
Route::get('/room/loginOut','room/Index/loginOut');//登出系统
Route::get('/room/UserLists','room/User/userLists');//获取用户列表
Route::get('/room/roleList','room/Role/getRoleList');//获取角色列表
Route::get('/room/rightList','room/right/getallrights');//获取所有权限
Route::get('/room/menulist','room/menu/getMenu');//获取菜单控制器
Route::get('/room/codeList','room/Code/getCodeList');//获取码表列表
//post
Route::post('/room/login','room/Index/login');//登录提交
Route::post('/room/systemSetting','room/System/saveSettings');//保存系统设置
Route::post('/room/addrole','room/role/addrole');//增加角色
Route::post('room/delRole','room/role/delrole');//删除角色
Route::post('/room/adduser','room/user/adduser');//增加用户
Route::post('/room/delUser','room/user/delUser');//删除用户
Route::post('/room/addright','room/right/addright');//添加权限
Route::post('/room/delright','room/right/delright');//删除权限
Route::post('/room/addMenu','room/menu/addmenu');//添加菜单控制器
Route::post('/room/delMenu','room/menu/delmenu');//删除菜单控制器

//后台新增内容--前端post
Route::post('/room/addBanner','room/banners/addBanner');//新增轮播信息
Route::post('/room/delBanners','room/banners/delBanners');//删除轮播信息

//后台新增内容--前端get
Route::get('/room/getBanners','room/banners/getBanners');//新增轮播信息


// 图片上传
Route::post('room/uploads','room/upload/uploads');//图片上传接口