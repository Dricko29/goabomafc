<?php

use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\EditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RedirectController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [RedirectController::class, 'redirect'])->name('dashboard');

    // backend
    Route::middleware(['role:administrator'])->prefix('administrator')->name('administrator.')->group(function(){
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });
    Route::middleware(['role:editor'])->prefix('editor')->name('editor.')->group(function(){
        Route::get('/dashboard', [EditorController::class, 'dashboard'])->name('dashboard');
    });
});