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
    @include('pc.download._main_download')
    @include('pc.layouts._footer')
@stop
@section('footJs')

@stop
