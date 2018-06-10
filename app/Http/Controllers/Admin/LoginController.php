<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth', [
        'except' => ['login', 'doLogin']
      ]);

      $this->middleware('guest', [
        'only' => ['login', 'doLogin']
      ]);
    }

    // 显示管理员的登录页面
    public function login()
    {
    	return view('admin.login.login');
    }

    // 处理管理员登录
    public function doLogin(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

    	if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'is_admin'=>true, 'actived'=>true])) {
    		return redirect()->intended(route('admin.dashboard'));
    	} else {
    		session()->flash('danger', '登录失败！请用正确的账号密码登录。');
    		return redirect()->back();
    	}
    }

    // 退出控制台
		public function logout()
		{
			Auth::logout();
			return redirect()->route('admin.login');
		}
}
