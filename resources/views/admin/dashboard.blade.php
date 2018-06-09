<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts._head')
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        @include('admin.layouts._left_nav')
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('admin.layouts._right_top')
            @include('admin.layouts._right_tab')
            @include('admin.layouts._right_content')
            @include('admin.layouts._right_foot')
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        @include('admin.layouts._right_sidebar')
        <!--右侧边栏结束-->
        <!--mini聊天窗口开始-->
        <!-- @ include('admin.layouts._small_chat_box') -->
    </div>
    <script src="/adminstyle/js/jquery.min.js?v=2.1.4"></script>
    <script src="/adminstyle/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/adminstyle/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/adminstyle/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/adminstyle/js/plugins/layer/layer.min.js"></script>
    <script src="/adminstyle/js/hplus.min.js?v=4.0.0"></script>
    <script src="/adminstyle/js/contabs.min.js" type="text/javascript"></script>
    <script src="/adminstyle/js/plugins/pace/pace.min.js"></script>
</body>

</html>
