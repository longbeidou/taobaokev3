<div class="container-fluid bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 box">
                <ul class="list-inline">
                    <li class="text-center line"><a href="{{ route('pc.index') }}" target="_blank" title="淘宝天猫优惠券">首页</a></li>
                    <li class="text-center line"><a href="{{ route('pc.search.index') }}" target="_self" title="淘宝天猫优惠券查询">搜索</a></li>
                    <li class="text-center"><strong>{{ $name or '' }}</strong>搜索结果："{{ $q }}"</li>
                </ul>
            </div>
        </div>
    </div>
</div>
