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
        Route::get('/s/{slug}', [PageController::class, 'service'])->name('service');
    });

Route::post('/upload', [ImageController::class, 'store'])
    ->name('image.store');


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
