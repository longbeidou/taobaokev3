<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\CouponRulesService;
use App\Http\Controllers\Controller;
use Auth;

class TbkDgItemCouponGetController extends Controller
{
    protected $couponRule;

    public function __construct(CouponRulesService $couponRule)
    {
      $this->middleware('auth');
      $this->couponRule = $couponRule;
    }

    public function show($id)
    {
      $this->isAdmin();
      $title = '商品分类aip获取规则详情';
      $couponRule = $this->couponRule->getItemById($id);

      if (empty($couponRule)) {
        return redirect()->route('goodsCategorys.index')->with('danger', 'id为'.$id.'的规则信息不存在！');
      }

      return view('admin.couponRule.show', compact('title', 'couponRule'));
    }

    public function create($goodsCategoryId)
    {
      $this->isAdmin();
      $title = '增加商品分类优惠券aip获取参数';

      return view('admin.couponRule.create', compact('goodsCategoryId', 'title'));
    }

    public function store(Request $request)
    {
      $this->isAdmin();
      $this->validate($request, [
        'q' => 'required',
        'page_size' => 'required|min:1|max:100',
        'goods_category_id' => 'required',
      ]);

      $result = $this->couponRule->updateOrCreateItem($request->all());

      if (empty($result)) {
        return redirect()->route('goodsCategorys.index')->with('danger', '创建商品分类id为'.$request->goods_category_id.'的规则失败！');
      }

      return redirect()->route('goodsCategorys.index')->with('success', '成功创建商品分类id为'.$request->goods_category_id.'的规则！');
    }

    public function edit()
    {
      $this->isAdmin();
    }

    public function update()
    {
      $this->isAdmin();
    }

    public function destroy()
    {
      $this->isAdmin();
    }

    // 判断是否是管理员
    public function isAdmin()
    {
      $this->authorize('isAdmin', Auth::user());
    }
}
