@extends('pc.layouts.master')
@section('title')
  @include('pc.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
    <header>
        @include('pc.layouts._top')
    </header>
    @include('pc.layouts._nav_tab')
    @include('pc.material._bread_crumb_baby')
    <div class="container-fluid coupon-list material-coupon-list">
        <div class="container">
            <div class="row">
                @include('pc.layouts._item_list_for_optimus_material')
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
    @include('pc.material._ajax_items')
@stop
