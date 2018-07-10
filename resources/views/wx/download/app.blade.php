@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')
<style media="screen">
   body{
     background-image: url('/wxstyle/images/app_bg.jpg');
     background-repeat: no-repeat;
     background-position: top;
   }
   .logo-box
   {
     margin-top: 28px;
     margin-bottom: 30px;
   }
   h1
   {
     font-size: 28px;
     font-weight: 800;
     color: #333;
     font-family: “Microsoft YaHei” ! important;
   }
   h2
   {
     font-size: 16px;
     line-height: 25px;
     font-weight: 600;
     color: #555;
   }
   .mui-content
   {
      background-color: transparent;
   }
   .app-box
   {
     margin-top: 20px;
   }
   .a-android
   {
     color: #fff;
     border-radius: 10px;
     border: 0px;
   }
   .a-android .box
   {

   }
   .a-android .box .action
   {
      font-size: 18px;
      font-weight: 800;
      line-height: 60px;
   }
</style>
@stop
@section('content')

@include('wx.layouts._footer_tab')

<div class="mui-content">
    <div class="mui-row">
        <div class="mui-col-xs-12 mui-text-center logo-box">
            <img class="mui-col-xs-4" src="/wxstyle/images/app_logo_400.png" alt="龙琴时代APP的logo">
            <h1>龙琴时代</h1>
            <h2>一个免费分享淘宝天猫优惠券的APP</h2>
        </div>

        <!-- 安卓版本下载 -->
        <div class="mui-col-xs-12 mui-text-center app-box">
            <a rel="nofollow" title="龙琴时代APP安卓版本下载" href="/download/52010000.cn.apk" class="mui-btn mui-col-xs-8 a-android" style="background-color: rgba(87, 87, 255, 1);">
                <div class="mui-row box">
                  <div class="mui-col-xs-3 mui-text-center">
                    <img src="/wxstyle/images/android.png" class="mui-col-xs-12" alt="龙琴时代安卓版本">
                  </div>
                  <div class="mui-col-xs-9 mui-text-center">
                    <span class="action">Android版本下载</span>
                  </div>
                </div>
            </a>
        </div>

        <!-- iOS版本下载 -->
        <div class="mui-col-xs-12 mui-text-center app-box">
            <a rel="nofollow" title="龙琴时代APP苹果版本下载" href="/download/52010000.cn.ipa" class="mui-btn mui-col-xs-8 a-android" style="background-color: rgba(0, 215, 132, 1);">
                <div class="mui-row box">
                  <div class="mui-col-xs-3 mui-text-center">
                    <img src="/wxstyle/images/android.png" class="mui-col-xs-12" alt="龙琴时代ios版本">
                  </div>
                  <div class="mui-col-xs-9 mui-text-center">
                    <span class="action">iPhone版本下载</span>
                  </div>
                </div>
            </a>
        </div>

    </div>
</div>
@stop
@section('footJs')

@stop
