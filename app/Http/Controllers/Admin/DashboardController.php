<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
		public function __construct()
		{
			$this->middleware('auth');
		}
		// 管理员的控制面板
		public function dashboard()
		{
			$this->isAdmin();
			$admin = Auth::user();
			return view('admin.dashboard', compact('admin'));
		}

		// 判断是否是管理员
		public function isAdmin()
		{
			$this->authorize('isAdmin', Auth::user());
		}
}
