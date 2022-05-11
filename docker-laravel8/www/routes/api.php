<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\FeedbackController;
use App\Http\Controllers\Api\v1\CountryController;
use App\Http\Controllers\Api\v1\FeedbackFileController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::resource("feedback_new", FeedbackController::class);
Route::resource("country", CountryController::class);
Route::resource("feedback_file", FeedbackFileController::class);
