<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Adminpanel\StoreQuestionRequest;
use App\Http\Requests\Adminpanel\UpdateQuestionRequest;
use App\Models\Question;
use App\Services\StaticPageGenerator;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.question.index', [
            'questions' => Question::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        Question::create($request->validated());

        return redirect()
            ->route('admin.question.index')
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
    public function edit(Question $question)
    {
        return view('Admin.question.edit', [
            'question' => $question,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $question->update($request->validated());

        return redirect()
            ->route('admin.question.index')
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

    public function GenerateStaticPage($question_slug)
    {
        $question = Question::where('slug', $question_slug)
            ->firstOrFail();
        if (StaticPageGenerator::generate(
            'question',
            $question,
            'userpanel.question.index',
            'question'
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
