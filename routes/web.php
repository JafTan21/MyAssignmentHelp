<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\Userpanel\PageController;
use App\Models\ServiceMenu;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::as('userpanel.')
    ->group(function () {
        Route::get('/', [PageController::class, 'home'])->name('home');
        Route::get('services', [PageController::class, 'services'])->name('services');
        Route::get('/{page}', [PageController::class, 'page'])
            ->where('page', 'answers|questions')
            ->name('page');

        Route::get('service/{page_slug}', [PageController::class, 'servicePage'])
            ->name('service-page');

        Route::get(
            'question-categories',
            [PageController::class, 'questionCategories']
        )->name('questionCategories');

        Route::get(
            'question-categories/{questionCategory_slug}/all-questions',
            [PageController::class, 'questionCategoriesAllQuestions']
        )->name('questionCategory.all-questions');

        Route::get(
            '/question/{question_slug}',
            [PageController::class, 'quesiton']
        )->name('question');
    });

Route::post('/upload', [ImageController::class, 'store'])
    ->name('image.store');

require __DIR__ . '/admin.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
