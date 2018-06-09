@if ( session('success') )
  <div class="alert alert-success .alert-dismissible fade in">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>成功：</strong>
    {{ session('success') }}
  </div>
@endif
@if ( session('info') )
  <div class="alert alert-info .alert-dismissible fade in">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>提示：</strong>
    {{ session('info') }}
  </div>
@endif
@if ( session('warning') )
  <div class="alert alert-warning .alert-dismissible fade in">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>警告：</strong>
    {{ session('warning') }}
  </div>
@endif
@if ( session('danger') )
  <div class="alert alert-danger .alert-dismissible fade in">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <strong>注意：</strong>
    {{ session('danger') }}
  </div>
@endif
