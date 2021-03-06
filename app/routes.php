<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => '', 'before' => ''), function () {
    Route::get('/', array('as' => 'site.home', 'uses' => 'SiteController@home'));
    Route::get('/p{id}/{name}', array('as' => 'site.page', 'uses' => 'SiteController@page'))->where('id', '[0-9]+');
    Route::get('/d{id}/{name}', array('as' => 'site.detail', 'uses' => 'SiteController@detail'))->where('id', '[0-9]+');
    Route::get('/thanh-toan', array('as' => 'site.payment_method', 'uses' => 'SiteController@paymentMethod'));
    Route::get('/lien-he', array('as' => 'site.contact', 'uses' => 'SiteController@contact'));

    /********************Giỏ hàng**********************/
    Route::get('cart', array('as' => 'cart.view', 'uses' => 'SiteController@cart'));
    Route::post('cart/add', array('as' => 'cart.add', 'uses' => 'AjaxSiteController@addCart'));
});
Route::group(array('prefix' => 'admin', 'before' => ''), function () {
    /*****************************login,logout****************************/
    Route::get('login/{url?}', array('as' => 'admin.login', 'uses' => 'LoginController@loginInfo'));
    Route::post('login/{url?}', array('as' => 'admin.login', 'uses' => 'LoginController@login'));
    Route::get('logout', array('as' => 'admin.logout', 'uses' => 'LoginController@logout'));
    /*****************************màn hình chính**************************/
    Route::get('dashboard', array('as' => 'admin.dashboard', 'uses' => 'DashBoardController@dashboard'));
    /*****************************thông tin tài khoản*********************/
    Route::get('user/view',array('as' => 'admin.user_view','uses' => 'UserController@view'));
    Route::get('user/create',array('as' => 'admin.user_create','uses' => 'UserController@createInfo'));
    Route::post('user/create',array('as' => 'admin.user_create','uses' => 'UserController@create'));
    Route::get('user/edit/{id}',array('as' => 'admin.user_edit','uses' => 'UserController@editInfo'))->where('id', '[0-9]+');
    Route::post('user/edit/{id}',array('as' => 'admin.user_edit','uses' => 'UserController@edit'))->where('id', '[0-9]+');
    Route::get('user/change/{id}',array('as' => 'admin.user_change','uses' => 'UserController@changePassInfo'));
    Route::post('user/change/{id}',array('as' => 'admin.user_change','uses' => 'UserController@changePass'));
    Route::post('user/remove/{id}',array('as' => 'admin.user_remove','uses' => 'UserController@remove'));
    /*thông tin quyền*/
    Route::get('permission/view',array('as' => 'admin.permission_view','uses' => 'PermissionController@view'));
    Route::get('permission/create',array('as' => 'admin.permission_create','uses' => 'PermissionController@createInfo'));
    Route::post('permission/create',array('as' => 'admin.permission_create','uses' => 'PermissionController@create'));
    Route::get('permission/edit/{id}',array('as' => 'admin.permission_edit','uses' => 'PermissionController@editInfo'))->where('id', '[0-9]+');
    Route::post('permission/edit/{id}',array('as' => 'admin.permission_edit','uses' => 'PermissionController@edit'))->where('id', '[0-9]+');
    /*thông tin nhóm quyền*/
    Route::get('groupUser/view',array('as' => 'admin.groupUser_view','uses' => 'GroupUserController@view'));
    Route::get('groupUser/create',array('as' => 'admin.groupUser_create','uses' => 'GroupUserController@createInfo'));
    Route::post('groupUser/create',array('as' => 'admin.groupUser_create','uses' => 'GroupUserController@create'));
    Route::get('groupUser/edit/{id}',array('as' => 'admin.groupUser_edit','uses' => 'GroupUserController@editInfo'))->where('id', '[0-9]+');
    Route::post('groupUser/edit/{id}',array('as' => 'admin.groupUser_edit','uses' => 'GroupUserController@edit'))->where('id', '[0-9]+');
    /**/
    Route::get('manage_site/banner/view',array('as' => 'admin.mngSite_banner_view','uses' => 'SiteManageController@viewBanner'));
    Route::get('manage_site/banner/add/{id?}',array('as' => 'admin.mngSite_banner_add','uses' => 'SiteManageController@getAddBanner'))->where('id', '[0-9]+');
    Route::post('manage_site/banner/add/{id?}',array('as' => 'admin.mngSite_banner_add','uses' => 'SiteManageController@postAddBanner'))->where('id', '[0-9]+');
    /**/
    Route::get('manage_site/page/view',array('as' => 'admin.mngSite_page_view','uses' => 'SiteManageController@viewpage'));
    Route::get('manage_site/page/add/{id?}',array('as' => 'admin.mngSite_page_add','uses' => 'SiteManageController@getAddPage'))->where('id', '[0-9]+');
    Route::post('manage_site/page/add/{id?}',array('as' => 'admin.mngSite_page_add','uses' => 'SiteManageController@postAddPage'))->where('id', '[0-9]+');
    /*Quản lý Sản Phẩm*/
    Route::get('product/view',array('as' => 'admin.product_list','uses' => 'ProductController@index'));
    Route::get('product/getCreate/{id?}', array('as' => 'admin.product_edit','uses' => 'ProductController@getCreate'));
    Route::post('product/getCreate/{id?}', array('as' => 'admin.product_edit_post','uses' => 'ProductController@postCreate'));
    Route::post('product/deleteItem', array('as' => 'admin.deltete_product_post','uses' => 'ProductController@deleteItem'));
});
