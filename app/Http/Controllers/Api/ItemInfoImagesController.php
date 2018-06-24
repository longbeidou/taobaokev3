<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Api\ItemInfoImagesService;

class ItemInfoImagesController extends Controller
{
    public $repository;

    public function __construct(ItemInfoImagesService $item)
    {
      $this->repository = $item;
    }

    // 返回商品id对应的商品详情图片信息
    public function itemDetailImage(Request $request)
    {
      $result = $this->repository->getImages($request->id);

      if (empty($request->id) || $result === false) {
        $result = 415;
      } else {
        $result = json_encode($result);
      }

      return $result;
    }
}
