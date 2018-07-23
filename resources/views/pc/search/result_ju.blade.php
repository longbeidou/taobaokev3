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

    <div class="container-fluid search-ju-list">
        <div class="container">
            <div class="row">
                <div class="col-xs-8 ju-result" id="ajax-ju-item-list">
                    @include('pc.search._item_ju_list')
                    @if(empty($juItems))
                        @include('pc.search._ajax_tips_ju_no')
                    @else
                        @include('pc.search._ajax_tips_ju')
                    @endif
                </div>
                <div class="col-xs-4 ju-recommend">
                    <div class="row r-name">
                        <div class="col-xs-12">
                            <h5>猜你喜欢</h5>
                        </div>
                    </div>
                    <div class="row r-bottom">
                        <div class="col-xs-12 r-box">
                            <div class="row r-item">
                                @include('pc.search._guess_you_like_ju')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pc.layouts._footer_adv')
    @include('pc.layouts._footer')
@stop
@section('footJs')
    @include('pc.search._ajax_items_ju')
@stop
