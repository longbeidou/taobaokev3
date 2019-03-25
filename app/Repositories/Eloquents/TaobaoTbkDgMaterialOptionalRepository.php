<?php

namespace App\Repositories\Eloquents;

use Illuminate\Http\Request;
use App\Repositories\Contracts\TaobaoTbkDgMaterialOptionalInterface;
use App\Models\TaobaoTbkDgMaterialOptional;

class TaobaoTbkDgMaterialOptionalRepository implements TaobaoTbkDgMaterialOptionalInterface
{
    public $itemCoupon;

    function __construct(TaobaoTbkDgMaterialOptional $itemCoupon)
    {
        $this->itemCoupon = $itemCoupon;
    }

    // 根据id获取信息
    public function getItemById($id)
    {
        return $this->itemCoupon->find($id);
    }

    // 更新现有或创建新数据
    public function updateOrCreateItem(array $data)
    {
        return $this->itemCoupon->updateOrCreate(
            ['goods_category_id' => $data['goods_category_id']],
            $data
        );
    }

    // 更加goods_category_id获取信息
    public function getItemByGoodsCategoryId($goodsCategoryId)
    {
        return $this->itemCoupon->where('goods_category_id', $goodsCategoryId)->first();
    }

    // 根据goods_category_id删除信息
    public function deleteByGoodsCategoryId($goodsCategoryId)
    {
        return $this->itemCoupon->where('goods_category_id', $goodsCategoryId)->delete();
    }
}
