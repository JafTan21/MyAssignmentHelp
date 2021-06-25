<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Page;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('Admin.index', [
            'message_count' => Message::count(),
            'user_count' => User::role('user')->count(),
            'question_count' => Question::count(),
            'service_count' => Page::count(),
        ]);
    }
}
