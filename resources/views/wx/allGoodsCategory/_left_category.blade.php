@foreach($leftTopCategory as $key => $category)
<a class="mui-control-item" href="#top{{ $key+1 }}">{{ $category->name }}</a>
@endforeach
