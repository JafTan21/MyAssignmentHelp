<?php

namespace App\Http\Controllers\Userpanel;

use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function home()
    {
        return view('userpanel.home.home');
    }

    public function service($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('userpanel.services.index', [
            'page' => $page
        ]);
    }
}
