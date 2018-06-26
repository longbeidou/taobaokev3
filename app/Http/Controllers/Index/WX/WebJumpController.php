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
}
