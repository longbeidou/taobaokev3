<?php

namespace App\Http\Controllers\Index\Share;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    // 无线端显示APP下载的页面
    public function app()
    {
        $title = "龙琴时代APP下载";

        return view('wx.download.app', compact('title'));
    }
}
