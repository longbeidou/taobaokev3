@extends('pc.layouts.master')
@section('title')
  @include('pc.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
    <header>
        @include('pc.layouts._top')
    </header>
    @include('pc.layouts._nav_tab')
    @include('pc.itemInfo.pintuan._bread_crumb')
    @include('pc.itemInfo.pintuan._item_info')
    @include('pc.itemInfo.index._images_details')
    <div class="container-fluid" id="recommend">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h3>——— 猜你喜欢 ———</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid coupon-list">
        <div class="container">
            <div class="row">
                @include('pc.layouts._guess_you_like_for_coupon')
            </div>
        </div>
    </div>
    @include('pc.layouts._footer_adv')
    @include('pc.layouts._footer')
@stop
@section('footJs')
<script type="text/javascript">
// 加载商品详情使用
$('#goods-images-tips').bind('click', function() {
    var tag = this.getAttribute('tag');
    if (tag == null || tag == '') {
        $('#goods-images-tips i').addClass('glyphicon-chevron-up');
        $('#goods-images-tips i').removeClass('glyphicon-chevron-down');
        $('#goods-images-tips').attr('tag', 'all')
        $('#goods-images-box').css('display', 'block')
        $('#goods-images-tips .tips .small').text('（点击折叠）')
        var mm = $('#goods-images').text();
        if (mm == '详情正在加载中...' || mm == '加载失败，请稍后重试...') {
            $.ajax({
              url : "{{ route('pc.api.itemInfoImages.itemDetailImage') }}",
              async : false,
              timeout : 10000,
              type : 'POST',
              data : {
                id : '{{ $itemInfo->num_iid }}'
              },
              success : function(data) {
                if(data == 415) {
                  $('#goods-images').text('加载失败，请稍后重试...')
                } else {
                  $('#goods-images').html(data)
                }
              },
              error:function(xhr,type,errorThrown){
                //异常处理；
                console.log(type);
              }
            });
        }
    } else {
        $('#goods-images-tips i').removeClass('glyphicon-chevron-up');
        $('#goods-images-tips i').addClass('glyphicon-chevron-down');
        $('#goods-images-tips').attr('tag', '')
        $('#goods-images-box').css('display', 'none')
        $('#goods-images-tips .tips .small').text('（点击展开）')
    }
});
</script>
@stop
