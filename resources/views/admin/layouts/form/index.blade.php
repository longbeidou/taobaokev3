<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.form._head')
    @section('headcss')
    @show
</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        @section('content')
        @show
    </div>

    @include('admin.layouts.form._foot_js')
    @section('footJs')
    @show
</body>

</html>
