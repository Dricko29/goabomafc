<?php

use App\Http\Controllers\Access\PermissionController;
use App\Http\Controllers\Access\RoleController;
use App\Http\Controllers\Access\UserController;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\EditorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlayerController;
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

    // siteman
    Route::prefix('siteman')->name('siteman.')->group(function(){
        Route::prefix('access')->name('access.')->name('access.')->group(function(){
            Route::get('roles/{role}/users', [RoleController::class, 'assignUserRole'])->name('roles.users.role');
            Route::post('roles/{role}/users/{user}', [RoleController::class, 'assignUser'])->name('roles.assign.users');
            Route::delete('roles/{role}/users/{user}', [RoleController::class, 'removeUserRole'])->name('roles.remove.user');
            Route::post('roles/{role}/permissions', [RoleController::class, 'syncPermissions'])->name('roles.sync.permissions');
            Route::post('roles/bulk-delete', [RoleController::class, 'bulkDelete'])->name('roles.bulk-delete');
            Route::resource('roles', RoleController::class);
            
            Route::post('permissions/bulk-delete', [PermissionController::class, 'bulkDelete'])->name('permissions.bulk-delete');
            Route::resource('permissions', PermissionController::class);

            Route::put('users/{user}/reset', [UserController::class, 'resetPassword'])->name('users.reset');
            Route::post('users/{user}/permissions', [UserController::class, 'syncPermissions'])->name('users.sync.permissions');
            Route::post('users/{user}/roles', [UserController::class, 'syncRoles'])->name('users.sync.roles');
            Route::post('users/bulk-delete', [UserController::class, 'bulkDelete'])->name('users.bulk-delete');
            Route::resource('users', UserController::class);
        });

        Route::post('clubs/background/{id}', [ClubController::class, 'updateBackground'])->name('club.update.background');
        Route::post('clubs/logo/{id}', [ClubController::class, 'updateLogo'])->name('club.update.logo');
        Route::resource('clubs', ClubController::class)->only(['index','edit', 'update']);

        Route::delete('players{player}/foto', [PlayerController::class, 'deletePlayerFoto'])->name('player.delete.foto');
        Route::post('players/upload', [PlayerController::class, 'uploadFoto']);
        Route::delete('players/delete', [PlayerController::class, 'deleteFoto']);
        Route::post('players/bulk-delete', [PlayerController::class, 'bulkDelete'])->name('players.bulk-delete');
        Route::resource('players',PlayerController::class);
    });
});