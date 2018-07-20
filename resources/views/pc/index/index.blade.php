@extends('pc.layouts.master')
@section('title')
  @include('pc.layouts._title_index')
  <meta name="keywords" content="{{ config('website.keywords') }}">
  <meta name="description" content="{{ config('website.description') }}">
@stop
@section('headcss')

@stop
@section('content')
    <header>
        @include('pc.layouts._save_url')
        @include('pc.layouts._top')
    </header>
    @include('pc.layouts._nav_tab')
    @include('pc.index._banner')
    @include('pc.index._img_category')
    <div class="container-fluid" id="recommend">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3>——— 今日推荐优惠券 ———</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid coupon-list">
        <div class="container">
            <div class="row">
                @include('pc.layouts._item_list_for_copon')
            </div>
        </div>
    </div>
    @include('pc.layouts._ajax_tips')
    @include('pc.layouts._footer_adv')
    @include('pc.layouts._footer')
@stop
@section('footJs')
    @include('pc.index._ajax_items')
@stop
