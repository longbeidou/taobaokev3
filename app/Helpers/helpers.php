<?php

// 合并两个数组，第一个数组为标准数组，第二个数组根据第一个数组的键值来更新第一个数组对应键对应的值
if (!function_exists('array_merge_update')) {
  function array_merge_update ($array1, $array2)
  {
    $array1Keys = array_keys($array1);

    foreach ($array2 as $key => $value) {
      if (in_array($key, $array1Keys)) {
        $array1[$key] = $value;
      }
    }

    return $array1;
  }
}
