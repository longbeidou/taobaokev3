<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\AlimamaService;

class IndexController extends Controller
{
    public $alimama;

    public function __construct(AlimamaService $api)
    {
      $this->alimama = $api;
    }

    public function index()
    {
      $title = config('website.indexTitle');
      return view('wx.index.index', compact('title'));
    }
}
