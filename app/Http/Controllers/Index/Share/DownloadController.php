<?php

namespace App\Http\Controllers\Index\Share;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    // 无线端显示APP下载的页面
    public function app()
    {
        $title = env('SITE_NAME') . "APP下载";

        return view('wx.download.app', compact('title'));
    }

    // PC端显示APP下载的页面
    public function appPC()
    {
        $title = env('SITE_NAME') . "APP下载";

        return view('pc.download.app', compact('title'));
    }
}
