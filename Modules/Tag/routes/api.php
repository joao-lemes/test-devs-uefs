<?php

use Illuminate\Support\Facades\Route;
use Modules\Tag\Http\Controllers\TagController;
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

Route::prefix('tags')->controller(TagController::class)->name('tag.')->group(function () {
    Route::get('/', 'listAction')->name('list');
    Route::get('/{id}', 'getAction')->name('get');
    Route::middleware(JwtMiddleware::class)->group(function (): void {
        Route::post('/', 'storeAction')->name('store');
        Route::put('/{id}', 'updateAction')->name('update');
        Route::delete('/{id}', 'deleteAction')->name('delete');
    });
});
