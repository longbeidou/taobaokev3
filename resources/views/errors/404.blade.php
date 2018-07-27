
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="404页面">

    <title>404页面 | {{config('website.name')}}</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style media="screen">
        a {
          color: #fff;
        }
        .navbar-inverse .navbar-brand,
        .navbar-inverse .navbar-nav>li>a {
          color: #fff;
        }
        .nav>li:hover {
          background-color: #fef490;
          /* background-color: rgba(255, 255, 255, 0.3); */
        }
        .navbar-inverse .navbar-nav>li:hover>a {
          color: #ed2a7a;
        }
        .navbar-inverse .navbar-toggle:hover {
          background-color: #fef490;
        }
        .navbar-inverse .navbar-toggle {
          border-color: #fff;
        }
        .navbar-inverse .navbar-toggle.navbar-toggle .icon-bar:hover {
          color: #ed2a7a;
        }
        .list-inline li a {
          color: #333;
          font-size: 20px;
          font-weight: 800;
          text-decoration: none;
        }
        .list-inline li a:hover {
          color: #ed2a7a;
        }
        h1 {
          font-size: 30px;
          font-weight: 800;
        }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse  navbar-fixed-top" style="background-color: #ed2a7a; border-color: #ed2a7a;">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('pc.index') }}">{{config('website.name')}}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            @include('pc.layouts._nav_tab_404')
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="row" style="padding-top: 150px;">
          <div class="col-xs-12 text-center">
            <h1>404页面</h1>
            <p class="lead">您访问的页面已失效，请访问其他页面查看信息。</p>
            <ul class="list-inline">
              <li><a href="{{ route('pc.index') }}">首页</a></li>
              <li><a href="{{ route('pc.allGoodsCategory.index') }}">商品分类</a></li>
              <li><a href="{{ route('pc.optimusMaterial.zhibo', ['id'=>0]) }}">好券直播</a></li>
            </ul>
          </div>
      </div>

    </div><!-- /.container -->

    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
