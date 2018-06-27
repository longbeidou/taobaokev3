<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\TaoQiangGouService;

class TaoQiangGouController extends Controller
{
  const PAGE_SIZE = '10';

  public $repository;
  public $tqgAdzoneId;

  public function __construct(TaoQiangGouService $repository)
  {
    $this->repository = $repository;
    $this->tqgAdzoneId = config('adzoneID.wx_tqg');
  }

  public function index()
  {
    $title = '淘抢购';
    $rulesArr = $this->repository->rulesArr($this->tqgAdzoneId, self::PAGE_SIZE);
    $tqgItems = $this->repository->tqgItems($rulesArr);

    return view('wx.taoQiangGou.index', compact('title', 'rulesArr', 'tqgItems'));
  }
}
