@foreach($leftTopCategory as $key => $category)
<a class="mui-control-item active-img" href="#top{{ $key+1 }}" box="top{{ $key+1 }}">{{ $category->name }}</a>
@endforeach
