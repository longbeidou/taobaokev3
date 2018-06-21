var rullArr = [
@foreach($rulesArr as $key => $rule)
 ['{{ $rule['hour'] }}', '{{ $rule['adzone_id'] }}', '{{ $rule['start_time'] }}', '{{ $rule['end_time'] }}', '{{ $rule['page_size'] }}', 1 ],
@endforeach
];
