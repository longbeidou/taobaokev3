@if ( session('success') )
  <div class="alert alert-success">
    <strong>成功：</strong>
    {{ session('success') }}
  </div>
@endif
@if ( session('info') )
  <div class="alert alert-info">
    <strong>提示：</strong>
    {{ session('info') }}
  </div>
@endif
@if ( session('warning') )
  <div class="alert alert-warning">
    <strong>警告：</strong>
    {{ session('warning') }}
  </div>
@endif
@if ( session('danger') )
  <div class="alert alert-danger">
    <strong>注意：</strong>
    {{ session('danger') }}
  </div>
@endif
