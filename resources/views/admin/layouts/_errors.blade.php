@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>提示：</strong> 操作错误！<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
