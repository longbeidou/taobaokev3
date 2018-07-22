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
        @include('pc.search._top_search')
    </header>
    @include('pc.layouts._nav_tab')
    @include('pc.search._bread_crumb')
    @include('pc.search._sort')
    <div class="container-fluid coupon-list" id="coupon-list">
        <div class="container">
            <div class="row">
                @include('pc.layouts._item_list_for_material')
            </div>
        </div>
    </div>
    @if(empty($materialItems))
        @include('pc.search._ajax_tips_no')
    @else
        @include('pc.layouts._ajax_tips')
    @endif
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
    @include('pc.search._ajax_items_material')
@stop
