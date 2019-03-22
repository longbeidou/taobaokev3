
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理员登录 - {{ env('APP_NAME') }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/storage/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/storage/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/storage/admin/css/animate.min.css" rel="stylesheet">
    <link href="/storage/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen  animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">
                  <i class="glyphicon glyphicon-user"></i>
                </h1>
            </div>
            <h3>管理员登录系统</h3>
            @include('admin.layouts._tips')
            <form class="m-t" role="form" method="post" action="{{ route('admin.dologin') }}">
              {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="邮箱" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="密码" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            </form>
        </div>
    </div>
    <script src="/storage/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/storage/admin/js/bootstrap.min.js?v=3.3.5"></script>
    <script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>

</html>
