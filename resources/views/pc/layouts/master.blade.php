<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        @section('title')
        @show
        <!-- Bootstrap -->
        <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <!-- 可选的 Bootstrap 主题文件 -->
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/pcstyle/css/main.css">
        <link rel="stylesheet" href="/pcstyle/css/iconfont.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!--[if lt IE 9]>
          <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        @section('headcss')
        @show
    </head>
    <body>
        @section('content')
        @show
        <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdn.bootcss.com/jquery_lazyload/1.9.7/jquery.lazyload.min.js"></script>
        <script type="text/javascript" src="/pcstyle/js/main.js"></script>
        <script type="text/javascript">
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        </script>
        @section('footJs')
        @show
        <div style="position: absolute; bottom: 1px; z-index: -10; width: 20px; padding-left: 20px; overflow: hidden;">
          <script src="{!! config('website.analysis_js_pc') !!}" language="JavaScript"></script>
        </div>
    </body>
</html>
