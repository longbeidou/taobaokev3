<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    echo 'sdfsd';
});

// 用户默认的用户注册登录路由
Auth::routes();
Route::get('/home', 'Home\HomeController@index')->name('home');

// 管理员后台登录
Route::prefix('admin')->group(function() {
	Route::get('login', 'Admin\LoginController@login')->name('admin.login');
  Route::post('login', 'Admin\LoginController@doLogin')->name('admin.dologin');
  Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
  Route::get('dashboard', 'Admin\DashboardController@dashboard')->name('admin.dashboard');
  Route::get('changepassword', 'Admin\UserController@changePassword')->name('admin.changePassword');
  Route::post('changepassword', 'Admin\UserController@doChangePassword')->name('admin.doChangePassword');
});
