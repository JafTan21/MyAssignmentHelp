<?php

use App\Http\Controllers\Adminpanel\AnswerController;
use App\Http\Controllers\Adminpanel\PageController;
use App\Http\Controllers\Adminpanel\QuestionCategoryController;
use App\Http\Controllers\Adminpanel\QuestionController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController as ControllersPageController;
use App\Http\Controllers\ServiceCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->as('admin.')
    ->group(function () {


        Route::get('/dashboard', [PageController::class, 'index'])->name('index');
        Route::get('/', [PageController::class, 'index']);
        Route::get('page/get-sub-categories/{id}', [ControllersPageController::class, 'getSubCategories'])->name('services.get-sub-categories');
        Route::resource('page', ControllersPageController::class);
        Route::get('service-category', [ServiceCategoryController::class, 'index'])->name('serviceCategory.index');
        Route::resource('message', MessageController::class);
        Route::resource('questionCategory', QuestionCategoryController::class);
        Route::resource('question', QuestionController::class);
        Route::resource('answer', AnswerController::class);
    });
