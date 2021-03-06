<?php

use App\Http\Controllers\Adminpanel\QuestionController;
use App\Http\Controllers\AssignmentRequest;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Userpanel\PageController;
use App\Models\Page;
use App\Models\QuestionCategory;
use App\Models\ServiceCategory;
use App\Models\ServiceMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
            'question-category/{questionCategory_slug}/all-questions',
            [PageController::class, 'questionCategoriesAllQuestions']
        )->name('questionCategory.all-questions');

        Route::get(
            '/question/{question_slug}',
            [PageController::class, 'quesiton']
        )->name('question');

        Route::resource('assignmentRequest', AssignmentRequest::class);

        Route::get('get-header-footer', function () {
            $serviceCategories = cache()->remember('serviceCategories', 5000, function () {
                return  ServiceCategory::select('name', 'id')
                ->with([
                    'serviceSubCategories'=>function ($query) {
                        $query->select('service_category_id', 'id', 'name');
                    }
                ])->get();
            });
            $questionCategories = cache()->remember('questionCategories', 5000, function () {
                return QuestionCategory::select('slug', 'name')->get();
            });
            $pages = cache()->remember('pages', 5000, function () {
                return Page::select('main_category_id', 'sub_category_id', 'slug', 'title')->get();
            });

            return response()->json([
                'headerContents' => response()->view('layouts.parts.user.header-contents', [
                    'serviceCategories' => $serviceCategories,
                    'questionCategories' => $questionCategories,
                    'pages' => $pages
                ])->content(),
                'footer' => response()->view('layouts.parts.user.footer', [
                    'serviceCategories' => $serviceCategories,
                    'questionCategories' => $questionCategories,
                    'pages' => $pages
                ])->content(),
            ]);
        });
    });

Route::post('/upload', [ImageController::class, 'store'])
    ->name('image.store');

    Route::get('/import', [QuestionController::class, 'import']);

require __DIR__ . '/admin.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
