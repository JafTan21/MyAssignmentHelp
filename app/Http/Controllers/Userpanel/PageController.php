<?php

namespace App\Http\Controllers\Userpanel;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;

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

    public function page($page)
    {
        return view('userpanel.' . $page . '.index');
    }

    public function questionCategories()
    {
        return view('userpanel.questionCategories.index', [
            'questionCategories' => QuestionCategory::orderBy('name')
                ->with('questions')
                ->get()
        ]);
    }

    public function questionCategoriesAllQuestions($questionCategory_slug)
    {
        $questionCategory = QuestionCategory::where('slug', $questionCategory_slug)
            ->with('questions')
            ->firstOrFail();

        return view('userpanel.questionCategories.all-questions', [
            'questionCategory' => $questionCategory,
        ]);
    }

    public function quesiton($question_slug)
    {
        $question = Question::where('slug', $question_slug)
            ->with('questionCategory')
            ->with('answer')
            ->firstOrFail();

        return view('userpanel.question.index', [
            'question' => $question
        ]);
    }

    public function services(Request $request)
    {
        return view('userpanel.services.all-services', [
            'servicePages' => Page::where('main_category_id', $request->query('mainCategory'))
                ->where('sub_category_id', $request->query('subCategory'))
                ->get(),
        ]);
    }

    public function servicePage(Request $request)
    {
        return view('userpanel.services.index', [
            'page' => Page::where('slug', $request->page_slug)
                ->firstOrFail(),
        ]);
    }
}
