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


Route::get('/nbp/healtCheck', [App\Http\Controllers\NBPController::class, 'healthCheck'])->name('npb.healthcheck');
Route::get('/nbp/getCurrenciesFromApi', [App\Http\Controllers\NBPController::class, 'getCurrenciesFromApi'])->name('npb.getCurrenciesFromApi');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
