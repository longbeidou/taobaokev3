<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\SearchService;

class SearchController extends Controller
{
    const ADZONE_ID = '770398581';
    const PAGE_SIZE = '40';

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

    // 全部的搜索
    public function all(Request $request)
    {
      $this->validate($request, [
        'q' => 'required'
      ]);

      $sort = empty($request->sort) ? '' : $request->sort;
      $q = $request->q;
      $para['sort'] = $this->repository->getSortValue($request->sort);
      $para['q'] = $request->q;
      $para['adzone_id'] = self::ADZONE_ID;
      $title = $request->q.'的淘宝天猫优惠券搜索结果';
      $couponItems = $this->repository->all(['adzone_id' => self::ADZONE_ID, 'page_size' => self::PAGE_SIZE, 'q' => $request->q, 'sort' => $sort]);

      return view('wx.search.result_all', compact('title', 'couponItems', 'q', 'para', 'sort'));
    }

    // 只搜索天猫
    public function tmall(Request $request)
    {
      $this->validate($request, [
        'q' => 'required'
      ]);

      $sort = empty($request->sort) ? '' : $request->sort;
      $q = $request->q;
      $para['sort'] = $this->repository->getSortValue($request->sort);
      $para['q'] = $request->q;
      $para['adzone_id'] = self::ADZONE_ID;
      $title = $request->q.'的天猫优惠券搜索结果';
      $couponItems = $this->repository->tmall(['adzone_id' => self::ADZONE_ID, 'page_size' => self::PAGE_SIZE, 'q' => $request->q, 'sort' => $sort]);

      return view('wx.search.result_tmall', compact('title', 'couponItems', 'q', 'para', 'sort'));
    }

    // 搜索聚划算
    public function ju(Request $request)
    {
      $this->validate($request, [
        'q' => 'required'
      ]);

      $word = $request->q;
      $juItems = $this->repository->ju(['current_page' => 1, 'page_size' => self::PAGE_SIZE, 'word' => $word]);
      dd($juItems);
    }

    // 淘口令搜索
    public function tpwd(Request $request)
    {
      $this->validate($request, [
        'q' => 'required'
      ]);

      $tpwdKeyword = $this->repository->tpwdQuery($request->q);
      $q = $this->repository->getGoodsTitle($tpwdKeyword);
      $sort = empty($request->sort) ? '' : $request->sort;
      $couponItems = $this->repository->all(['adzone_id' => self::ADZONE_ID, 'page_size' => self::PAGE_SIZE, 'q' => $q, 'sort' => $sort]);
      $para['sort'] = $this->repository->getSortValue($request->sort);
      $para['q'] = $q;
      $para['adzone_id'] = self::ADZONE_ID;
      $title = $request->q.'的淘口令优惠券搜索结果';

      return view('wx.search.result_tpwd', compact('title', 'couponItems', 'q', 'para', 'sort'));
    }
}
