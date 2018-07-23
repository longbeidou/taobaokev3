<?php

namespace App\Http\Controllers\Index\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PC\TaoQiangGouService;

class TaoQiangGouController extends Controller
{
  const PAGE_SIZE = '18';

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
    $pageSize = self::PAGE_SIZE;

    return view('pc.taoQiangGou.index', compact('title', 'rulesArr', 'tqgItems', 'pageSize'));
  }
}
