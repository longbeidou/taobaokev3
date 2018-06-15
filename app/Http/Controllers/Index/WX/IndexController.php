<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\IndexService;

class IndexController extends Controller
{
    const ADZONE_ID = 770398581;
    const PAGE_SIZE = 20;

    public $repository;

    public function __construct(IndexService $api)
    {
      $this->repository = $api;
    }

    public function index()
    {
      $title = config('website.indexTitle');
      $adzoneId = self::ADZONE_ID;
      $pageSize = self::PAGE_SIZE;
      $couponItems = $this->repository->couponItems(['adzone_id' => self::ADZONE_ID, 'page_size'=>self::PAGE_SIZE]);

      return view('wx.index.index', compact('title', 'couponItems', 'adzoneId', 'pageSize'));
    }
}
