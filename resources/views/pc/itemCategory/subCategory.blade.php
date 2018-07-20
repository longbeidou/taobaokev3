@extends('pc.layouts.master')
@section('title')
  @include('pc.layouts._title_category')
  <meta name="keywords" content="{{ config('website.keywords') }}">
  <meta name="description" content="{{ config('website.description') }}">
@stop
@section('headcss')

@stop
@section('content')
    <header>
        @include('pc.layouts._top')
    </header>
    @include('pc.layouts._nav_tab')
    @include('pc.itemCategory._subCategory')
    <div class="container-fluid bread-crumb">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 box">
                    <ul class="list-inline">
                        @inject('showActive', 'App\Presenters\CouponListPresenter')
                        <li class="text-center {{ $showActive->showActiveForSortPC($sort, '') }}"><a href="{{ route('pc.goodsCategorys.categoryTwo', $goodsCategoryInfo->id) }}" target="_self" title="">综合排序</a></li>
                        <li class="text-center {{ $showActive->showActiveForSortPC($sort, 'sales') }}"><a href="{{ route('pc.goodsCategorys.categoryTwo', ['id' => $goodsCategoryInfo->id, 'sort' => 'sales']) }}" target="_self" title="">销量</a></li>
                        <li class="text-center {{ $showActive->showActiveForSortPC($sort, 'price') }}"><a href="{{ route('pc.goodsCategorys.categoryTwo', ['id' => $goodsCategoryInfo->id, 'sort' => 'price']) }}" target="_self" title="">价格</a></li>
                        <li class="text-center {{ $showActive->showActiveForSortPC($sort, 'commi') }}"><a href="{{ route('pc.goodsCategorys.categoryTwo', ['id' => $goodsCategoryInfo->id, 'sort' => 'commi']) }}" target="_self" title="">最热</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid coupon-list" id="coupon-list">
        <div class="container">
            <div class="row">
                @include('pc.layouts._item_list_for_material')
            </div>
        </div>
    </div>
    @include('pc.layouts._ajax_tips')
    <div class="container-fluid" id="recommend">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3>——— 猜你喜欢 ———</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid coupon-list">
        <div class="container">
            <div class="row">
                @include('pc.layouts._guess_you_like_for_coupon')
            </div>
        </div>
    </div>
    @include('pc.layouts._footer_adv')
    @include('pc.layouts._footer')
@stop
@section('footJs')
    @include('pc.itemCategory._ajax_items')
@stop
