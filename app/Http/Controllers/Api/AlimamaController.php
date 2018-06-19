<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Api\AlimamaService;

class AlimamaController extends Controller
{
    public $repository;

    public function __construct(AlimamaService $alimama)
    {
      $this->repository = $alimama;
    }

    // 好券清单的api
    public function taobaoTbkDgItemCouponGet(Request $request)
    {
      if (empty($request->adzone_id) || empty($request->page_size) || empty($request->page_no)) {
        return 415;
      }

      $result = $this->repository->taobaoTbkDgItemCouponGet($request->all());

      if (!$result) {
        return 415;
      }

      return $result;
    }

    // 通用物料搜索API（导购）
    public function taobaoTbkDgMaterialOptional(Request $request)
    {
      if (empty($request->adzone_id) || empty($request->page_size) || empty($request->page_no) || empty($request->q)) {
        return 415;
      }

      $result = $this->repository->taobaoTbkDgMaterialOptional($request->all());

      if (!$result) {
        return 415;
      }

      return $result;
    }

    // 聚划算的api
    public function taobaoJuItemsSearch(Request $request)
    {
      if (empty($request->adzone_id) || empty($request->page_size) || empty($request->current_page)) {
        return 415;
      }

      $result = $this->repository->taobaoJuItemsSearch($request->all());

      if (!$result) {
        return 415;
      }

      return $result;
    }
}
