<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

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

Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {
    Route::get('/', 'listAction')->name('list');
    Route::post('/', 'storeAction')->name('store');
    Route::get('/{id}', 'getAction')->name('get');
    Route::put('/{id}', 'updateAction')->name('update');
    Route::delete('/{id}', 'deleteAction')->name('delete');
});
