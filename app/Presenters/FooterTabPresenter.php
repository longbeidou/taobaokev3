<?php

namespace App\Presenters;

class FooterTabPresenter
{
  public function isActiveAction($standerUrl, $nowUrl = null)
  {
    if ($nowUrl == null) {
      $nowUrl = url()->full();
    }

    if ($nowUrl == $standerUrl) {
      return 'mui-active';
    } else {
      return '';
    }
  }
}
