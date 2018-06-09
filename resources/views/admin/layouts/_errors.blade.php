@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>提示：</strong> 没有获得管理员登录权限！<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
