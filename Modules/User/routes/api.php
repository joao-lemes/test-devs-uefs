<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthController;
use Modules\User\Http\Controllers\UserController;
use Modules\User\Http\Middleware\JwtMiddleware;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::prefix('users')->controller(UserController::class)->name('user.')->group(function () {
    Route::get('/', 'listAction')->name('list');
    Route::post('/', 'storeAction')->name('store');
    Route::get('/{id}', 'getAction')->name('get');
    Route::middleware(JwtMiddleware::class)->group(function (): void {
        Route::put('/', 'updateAction')->name('update');
        Route::delete('/', 'deleteAction')->name('delete');
    });
});

Route::controller(AuthController::class)->name('auth.')->group(function (): void {
    Route::post('/login', 'loginAction')->name('login');
    Route::post('/logout', 'logoutAction')->name('logout')->middleware(JwtMiddleware::class);
});
