<div class="container-fluid bread-crumb">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 box">
                <ul class="list-inline">
                    @inject('showActive', 'App\Presenters\CouponListPresenter')
                    <li class="text-center {{ $showActive->showActiveForSortPC($sort, '') }}"><a href="{{ url()->current() }}?q={{ $q }}" target="_self" title="">综合排序</a></li>
                    <li class="text-center {{ $showActive->showActiveForSortPC($sort, 'sales') }}"><a href="{{ url()->current() }}?sort=sales&q={{ $q }}" target="_self" title="">销量</a></li>
                    <li class="text-center {{ $showActive->showActiveForSortPC($sort, 'price') }}"><a href="{{ url()->current() }}?sort=price&q={{ $q }}" target="_self" title="">价格</a></li>
                    <li class="text-center {{ $showActive->showActiveForSortPC($sort, 'commi') }}"><a href="{{ url()->current() }}?sort=commi&q={{ $q }}" target="_self" title="">最热</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
