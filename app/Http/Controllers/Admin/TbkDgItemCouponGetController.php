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

    public function create()
    {
      $this->isAdmin();
    }

    public function store()
    {
      $this->isAdmin();
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
