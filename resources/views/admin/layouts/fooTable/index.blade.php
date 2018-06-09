<!DOCTYPE html>
<html>
<head>

  @include('admin.layouts.fooTable._head')
  @section('headcss')
  @show

</head>
<body class="gray-bg">
   <div class="wrapper wrapper-content animated fadeInRight">
     @section('content')
     @show
   </div>

   @include('admin.layouts.fooTable._foot')
   @section('footJs')
   @show
</body>
</html>
