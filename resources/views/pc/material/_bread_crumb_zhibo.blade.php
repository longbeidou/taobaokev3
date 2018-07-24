<div class="container-fluid bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 box">
                <ul class="list-inline">
                    <li class="text-center line"><a href="{{ route('pc.index') }}" target="_blank" title="天猫超市优惠券">首页</a></li>
                    <li class="text-center line"><a href="{{ route('pc.allGoodsCategory.index') }}" target="_self" title="淘宝天猫优惠券商品分类">全部商品</a></li>
                    @foreach($allInfo['rules'] as $key => $rule)
                        @if($key == 0)
                        <li class="text-center line @if($key == $currentId) active @endif"><a href="{{ route('pc.optimusMaterial.zhibo', ['id'=>$key]) }}" target="_self" title="{{ $rule['category'] }}淘宝天猫优惠券">{{ $rule['category'] }}</a></li>
                        @else
                        <li class="text-center @if($key == $currentId) active @endif"><a href="{{ route('pc.optimusMaterial.zhibo', ['id'=>$key]) }}" target="_self" title="{{ $rule['category'] }}淘宝天猫优惠券">{{ $rule['category'] }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
