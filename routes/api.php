<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Cotrollers\UploadController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("uploadcv", [App\Http\Controllers\UploadController::class,'uploadcv']);
Route::post("uploadportfolio", [App\Http\Controllers\UploadController::class,'uploadportfolio']);
Route::post("uploaddocument", [App\Http\Controllers\UploadController::class,'uploaddocument']);
