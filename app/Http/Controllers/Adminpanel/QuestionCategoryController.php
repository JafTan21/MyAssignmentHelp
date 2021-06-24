<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adminpanel\StoreQuestionCategoryRequest;
use App\Http\Requests\Adminpanel\UpdateQuestionCategoryRequest;
use App\Models\QuestionCategory;
use App\Services\StaticPageGenerator;
use Illuminate\Http\Request;

class QuestionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.questionCategory.index', [
            'questionCategories' => QuestionCategory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.questionCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionCategoryRequest $request)
    {
        QuestionCategory::create($request->validated());

        return redirect()
            ->route('admin.questionCategory.index')
            ->with('success', 'Created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionCategory $questionCategory)
    {
        return view('Admin.questionCategory.edit', [
            'questionCategory' => $questionCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionCategoryRequest $request, QuestionCategory $questionCategory)
    {
        $questionCategory->update($request->validated());

        return redirect()
            ->route('admin.questionCategory.index')
            ->with('success', 'Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function GenerateStaticPage($question_category_slug)
    {
        $question_category = QuestionCategory::where('slug', $question_category_slug)
            ->firstOrFail();
        if (StaticPageGenerator::generate(
            'question-category',
            $question_category,
            'userpanel.questionCategories.all-questions',
            'questionCategory'
        )) {
            $data = [
                'success' => 'Static page created successfully',
            ];
        } else {
            $data = [
                'error' => 'something went wrong',
            ];
        }

        return redirect()->back()->with($data);
    }
}
