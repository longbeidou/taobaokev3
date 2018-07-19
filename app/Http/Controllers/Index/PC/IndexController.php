<?php

namespace App\Http\Controllers\Index\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $title = config('website.indexTitle');
        
        return view('pc.index.index', compact('title'));
    }
}
