@extends('admin.layouts.table.index')

@section('title', $title)
@section('headcss')

@stop
@section('content')
<div class="row">
  <div class="col-sm-12">
    @include('admin.layouts.form._errors')
    @include('admin.layouts.form._tips')
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>商品分类列表</h5>
          </div>
          <div class="ibox-content">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>id</th>
                          <th>名称</th>
                          <th>父ID</th>
                          <th>分类等级</th>
                          <th class="text-center">图片</th>
                          <th class="text-center">font icon</th>
                          <th>path字段</th>
                          <th>排序</th>
                          <th  class="text-center">是否展示</th>
                          <th  class="text-center">是否推荐</th>
                          <th  class="text-center">类目id</th>
                          <th  class="text-center">页大小</th>
                          <th  class="text-center">查询词</th>
                          <th  class="text-center">编辑</th>
                      </tr>
                  </thead>
                  <tbody>
                    @include('admin.goodsCategory._info')
                  </tbody>
              </table>
              <div class="row text-center">
                {{ $goodsCategories->render() }}
              </div>
          </div>
      </div>
  </div>
</div>
@stop
@section('footJs')

@stop
