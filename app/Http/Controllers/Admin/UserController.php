<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
  // 显示修改管理员密码的页面
  public function changePassword()
  {
    $this->isAdmin();
    $title = '修改密码';

    return view('admin.users.change_password', compact('title'));
  }

  // 执行修改密码的操作
  public function doChangePassword(Request $request)
  {
    $this->isAdmin();

    $this->validate($request, [
      'password_ori' => 'required|min:6|max:25',
      'password' => 'required|min:6|max:25|confirmed',
      'password_confirmation' => 'required|min:6|max:25',
    ]);

    if (Hash::check($request->password_ori, Auth::user()->password)) {
      User::where('id', Auth::id())->update(['password'=>bcrypt($request->password)]);
      return back()->with('info', '成功修改密码！');
    } else {
      return back()->with('warning', '输入的原始密码错误！');
    }
  }

  // 判断是否是管理员
  public function isAdmin()
  {
    $this->authorize('isAdmin', Auth::user());
  }
}
