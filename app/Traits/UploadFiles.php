<?php

namespace App\traits;

trait UploadFiles
{
  // 处理上传的图片
  public function getImagesSavePath ($request, String $path, String $field)
  {
    if ( $request->hasFile($field) ) {
      $fileDir = $path.date('Y-m-d').'/';
      $file = $request->file($field);
      $extension = $file->getClientOriginalExtension();
      $newName = md5(time().str_random(25)).'.'.$extension;
      $file->move($fileDir, $newName);

      return '/'.$fileDir.$newName;
    }

    return '';
  }
}
