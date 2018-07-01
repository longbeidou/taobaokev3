<?php

namespace App\Http\Controllers\Index\WX;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\WX\SearchService;

class SearchController extends Controller
{
    const PAGE_SIZE = '40';

    public $repository;
    public $juPid;
    public $guessYouLikeAdzoneId;
    public $searchAllAdzonId;
    public $searchTmallAdzoneId;
    public $searchTpwdAdzoneId;

    public function __construct(SearchService $repository)
    {
      $this->juPid = config('adzoneID.wx_ju_search_pid');
      $this->repository = $repository;
      $this->guessYouLikeAdzoneId = config('adzoneID.wx_coupon_guess_you_like');
      $this->searchAllAdzonId = config('adzoneID.wx_search_all_adzone_id');
      $this->searchTmallAdzoneId = config('adzoneID.wx_search_tmall_adzone_id');
      $this->searchTpwdAdzoneId = config('adzoneID.wx_search_tpwd');
    }

    public function index()
    {
      $title = "淘宝天猫优惠券查询系统";
      $guessYouLikeCoupons = $this->repository->guessYouLike($this->guessYouLikeAdzoneId, '5');

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
      $para['adzone_id'] = $this->searchAllAdzonId;
      $title = $request->q.'淘宝天猫优惠券';
      $couponItems = $this->repository->all(['adzone_id' => $this->searchAllAdzonId, 'page_size' => self::PAGE_SIZE, 'q' => $request->q, 'sort' => $sort]);

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
      $para['adzone_id'] = $this->searchTmallAdzoneId;
      $title = $request->q.'天猫优惠券';
      $couponItems = $this->repository->tmall(['adzone_id' => $this->searchTmallAdzoneId, 'page_size' => self::PAGE_SIZE, 'q' => $request->q, 'sort' => $sort]);

      return view('wx.search.result_tmall', compact('title', 'couponItems', 'q', 'para', 'sort'));
    }

    // 搜索聚划算
    public function ju(Request $request)
    {
      $this->validate($request, [
        'q' => 'required'
      ]);

      $word = $request->q;
      $juItems = $this->repository->ju([
        'current_page' => 1,
        'page_size' => self::PAGE_SIZE,
        'word' => $word,
        'pid' => $this->juPid
      ]);
      $para['q'] = $word;
      $para['pid'] = $this->juPid;
      $title = $request->q.'的聚划算商品';

      return view('wx.search.result_ju', compact('title', 'juItems', 'q', 'para'));
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
      $couponItems = $this->repository->all(['adzone_id' => $this->searchTpwdAdzoneId, 'page_size' => self::PAGE_SIZE, 'q' => $q, 'sort' => $sort]);
      $para['sort'] = $this->repository->getSortValue($request->sort);
      $para['q'] = $q;
      $para['adzone_id'] = $this->searchTpwdAdzoneId;
      $title = $request->q.'的淘口令优惠券搜索结果';

      return view('wx.search.result_tpwd', compact('title', 'couponItems', 'q', 'para', 'sort'));
    }
}
