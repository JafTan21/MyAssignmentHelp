<?php

namespace App\Http\Controllers\Userpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('userpanel.home.home');
    }
}
