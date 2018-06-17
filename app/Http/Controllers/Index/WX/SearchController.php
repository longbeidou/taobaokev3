<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\SearchService;

class SearchController extends Controller
{
    const ADZONE_ID = '770398581';

    public $repository;

    public function __construct(SearchService $repository)
    {
      $this->repository = $repository;
    }

    public function index()
    {
      $title = "淘宝天猫优惠券查询系统";
      $guessYouLikeCoupons = $this->repository->guessYouLike(self::ADZONE_ID, '5');

      return view('wx.search.index', compact('title', 'guessYouLikeCoupons'));
    }
}
