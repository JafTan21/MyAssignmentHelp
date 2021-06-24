<?php

use App\Http\Controllers\Adminpanel\AnswerController;
use App\Http\Controllers\Adminpanel\PageController;
use App\Http\Controllers\Adminpanel\QuestionCategoryController;
use App\Http\Controllers\Adminpanel\QuestionController;
use App\Http\Controllers\Adminpanel\UsersController;
use App\Http\Controllers\AssignmentRequest;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\ServiceCategoryController;
use App\Models\Page;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Services\StaticPageGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->as('admin.')
    ->group(function () {


        Route::get('/dashboard', [PageController::class, 'index'])->name('index');
        Route::get('/', [PageController::class, 'index']);
        Route::get('service-category', [ServiceCategoryController::class, 'index'])->name('serviceCategory.index');
        Route::get('/message/inbox/{room}', [MessageController::class, 'inbox'])->name('message.inbox');

        //page
        Route::get('page/get-sub-categories/{id}', [ControllersPageController::class, 'getSubCategories'])->name('services.get-sub-categories');
        Route::get('page/{page_slug}/generate-static-page', [ControllersPageController::class, 'GenerateStaticPage'])->name('page.GenerateStaticPage');
        Route::resource('page', ControllersPageController::class);


        Route::resource('message', MessageController::class);


        //question category
        Route::get('questionCategory/{question_category_slug}/generate-static-page', [QuestionCategoryController::class, 'GenerateStaticPage'])->name('questionCategory.GenerateStaticPage');
        Route::resource('questionCategory', QuestionCategoryController::class);

        //question
        Route::get('question/{question_slug}/generate-static-page', [QuestionController::class, 'GenerateStaticPage'])->name('question.GenerateStaticPage');
        Route::resource('question', QuestionController::class);


        Route::resource('answer', AnswerController::class);
        Route::resource('users', UsersController::class);

        Route::resource('assignmentRequest', AssignmentRequest::class);

        Route::get('generate-all-static-pages/{which}', function ($which) {

            if ($which == 'all' || $which == 'question') {
                // questions
                Question::all()->each(function ($question) {
                    StaticPageGenerator::generate(
                        'question',
                        $question,
                        'userpanel.question.index',
                        'question'
                    );
                });
            }


            if ($which == 'all' || $which == 'category') {
                // q category
                QuestionCategory::all()->each(function ($question_category) {
                    StaticPageGenerator::generate(
                        'question-category',
                        $question_category,
                        'userpanel.questionCategories.all-questions',
                        'questionCategory'
                    );
                });
            }


            if ($which == 'all' || $which == 'service') {
                // pages
                Page::all()->each(function ($page) {
                    StaticPageGenerator::generate(
                        'service',
                        $page,
                        'userpanel.services.index',
                        'page'
                    );
                });
            }


            return redirect()
                ->route('admin.index')
                ->with('success', 'Successfull');
        })
            ->name('generate-all-static-pages');
    });
