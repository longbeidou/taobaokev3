<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    @section('title')
    @show
    <link href="/wxstyle/css/mui.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="/wxstyle/css/icons-extra.css" />
    <link href="/wxstyle/css/main.css" rel="stylesheet"/>
    @section('headcss')
    @show
    <script type="text/javascript">
  </script>
</head>
<body>
    @section('content')
    @show

	 <script src="/wxstyle/js/mui.min.js"></script>
   @section('footJs')
   @show

   <script type="text/javascript">
     // 监听tap事件，解决 a标签 不能跳转页面问题
     mui('#lbd-footer-tab').on('tap','a',function(){
       document.location.href=this.href;
     })
   </script>
   {!! config('website.wx_search_engines_push_js') !!}
   <!-- 站长统计 -->
   <div style="position: absolute; bottom: 1px; z-index: -10;">
     {!! config('website.analysis_js_wx') !!}
   </div>
</body>
</html>
