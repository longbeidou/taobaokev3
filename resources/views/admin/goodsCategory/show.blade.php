@extends('admin.layouts.form.index')

@section('title', $title)
@section('headcss')

@stop
@section('content')
<div class="row">
  <div class="col-sm-6 col-sm-offset-3">
      <div class="ibox float-e-margins">
          @include('admin.layouts.form._errors')
          @include('admin.layouts.form._tips')
          <div class="ibox-title">
              <h5>商品分类详情</h5>
              <div class="ibox-tools">
                  <a href="{{ route('goodsCategorys.index') }}">
                      商品分类列表
                  </a>
              </div>
          </div>
          <div class="ibox-content" style="display: block;">
            <div class="row form-body form-horizontal m-t">
                <div class="row">

                  @inject('show', 'App\Presenters\GoodsCategoryPresenter')
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">分类名称：</label>
                            <div class="col-sm-9">
                                <p>{{ $goodsCategory->name }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">所属栏目：</label>
                            <div class="col-sm-9">
                                <p>{{ $show->getParentItemName($goodsCategory->parent_id) }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">排列顺序：</label>
                            <div class="col-sm-9">
                              <p>{{ $goodsCategory->order }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">图片：</label>
                            <div class="col-sm-9">
                                <img src="{{ $goodsCategory->image }}" style="max-width:100px;" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">字体图标：</label>
                            <div class="col-sm-9">
                              <p>{!! $goodsCategory->font_icon !!}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">是否展示：</label>
                            <div class="col-sm-9">
                              <p>{{ $show->isShownForYesOrNo($goodsCategory->is_shown) }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="-NaN">是否推荐：</label>
                            <div class="col-sm-9">
                              <p>{{ $show->isRecommendedForYesOrNo($goodsCategory->is_recommended) }}</p>
                            </div>
                        </div>
                    </div>

                  </div>
                </div>
          </div>
      </div>
  </div>
</div>
@stop
@section('footJs')

@stop
