<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/card/uuid/{uuid}', [App\Http\Controllers\CardController::class, 'getCard']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/card/all', [App\Http\Controllers\CardController::class, 'getAll']);
    Route::post('/card/store', [App\Http\Controllers\CardController::class, 'store']);
    Route::post('/card/drop', [App\Http\Controllers\CardController::class, 'drop']);
});


/* Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
 */