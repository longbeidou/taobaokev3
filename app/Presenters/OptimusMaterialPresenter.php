<?php

namespace App\Presenters;

class OptimusMaterialPresenter
{
    public function getParaStrFromUrl($url)
    {
       $urlArr = explode('?', $url);

       return empty($urlArr[1]) ? '' : $urlArr[1];
    }
}
