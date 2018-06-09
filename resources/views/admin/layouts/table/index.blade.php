<!DOCTYPE html>
<html>
<head>

  @include('admin.layouts.table._head')
  @section('headcss')
  @show

</head>
<body class="gray-bg">
   <div class="wrapper wrapper-content animated fadeInRight">
     @section('content')
     @show
   </div>

   @include('admin.layouts.table._foot_js')
   @section('footJs')
   @show
</body>
</html>
