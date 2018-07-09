<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\WebJumpService;

class WebJumpController extends Controller
{
    public $repository;

    public function __construct(WebJumpService $webJump)
    {
      $this->repository = $webJump;
    }

    // 淘抢购的跳转
    public function tqg(Request $request)
    {
      empty($request->e) ? abort('404') : $e = $request->e;
      $url = 'https://s.click.taobao.com/t?e='.urldecode($e);
      $showClient = $this->repository->showClient(config('website.show_client'));

      if ($showClient) {
        header('Location:'.$url);
      } else {
        $title = '提示';
        return view('wx.webJump.index', compact('title'));
      }
    }

    // 淘抢购通过ajax获得的链接跳转
    public function tqgForJs(Request $request)
    {
      empty($e = $request->e) ? abort('404') : '';
      $showClient = $this->repository->showClient(config('website.show_client'));
      if ($showClient) {
        header('Location:https://s.click.taobao.com/t?e='.$e);
      } else {
        $title = '提示';
        return view('wx.webJump.index', compact('title'));
      }
    }

    // 聚划算的跳转
    public function ju(Request $request)
    {
      empty($request->e) ? abort('404') : $para = $request->e;
      $e = urldecode($para);
      $url = 'https://s.click.taobao.com/t?e='.$e;
      $showClient = $this->repository->showClient(config('website.show_client'));

      if ($showClient) {
        header('Location:'.$url);
      } else {
        $title = '提示';
        return view('wx.webJump.index', compact('title'));
      }
    }

    // 用于js通过ajax获取的链接跳转
    public function juForJs(Request $request)
    {
      empty($request->e) ? abort('404') : $e = $request->e;
      $url = 'https://s.click.taobao.com/t?e='.$e;
      $showClient = $this->repository->showClient(config('website.show_client'));

      if ($showClient) {
        header('Location:'.$url);
      } else {
        $title = '提示';
        return view('wx.webJump.index', compact('title'));
      }
    }

    // 用于淘口令的跳转
    public function tpwd($tpwd)
    {
      $showClient = $this->repository->showClient(config('website.show_client'));

      if ($showClient) {
        $tpwdInfo = $this->repository->tpwdInfo($tpwd);
        empty($tpwdInfo) ? abort('404') : '';
        header('Location:'.$tpwdInfo->url);
      } else {
        $title = 'VIP渠道专享淘口令';
        $name = 'VIP渠道专享淘口令';

        return view('wx.webJump.tpwd', compact('tpwd', 'title', 'name'));
      }
    }
}
