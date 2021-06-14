<?php

use App\Http\Controllers\Adminpanel\PageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->as('admin.')
    ->group(function () {
        Route::get('/', [PageController::class, 'index'])
            ->name('index');
    });
