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
      empty($request->u) ? abort('404') : $para = $request->u;
      $url = urldecode($para);
      $urlNew = str_replace('jd.com', 'taobao.com', $url);
      $showClient = $this->repository->showClient(config('website.show_client'));

      if ($showClient) {
        header('Location:'.$urlNew);
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
      empty($request->u) ? abort('404') : $para = $request->u;
      $url = urldecode($para);
      $urlNew = str_replace('jd.com', 'taobao.com', $url);
      $showClient = $this->repository->showClient(config('website.show_client'));

      if ($showClient) {
        header('Location:'.$urlNew);
      } else {
        $title = '提示';
        return view('wx.webJump.index', compact('title'));
      }
    }

    // 用于js通过ajax获取的链接跳转
    public function juForJs($id, $itemId)
    {
      (empty($id) || empty($itemId)) ? abort('404') : '';
      $showClient = $this->repository->showClient(config('website.show_client'));
      if ($showClient) {
        header('Location://detail.ju.taobao.com/home.htm?id='.$id.'&item_id='.$itemId);
      } else {
        $title = '提示';
        return view('wx.webJump.index', compact('title'));
      }
    }
}
