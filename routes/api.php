<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EmployeeController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('articles')->group(function () {
    Route::get('{article}', [ArticleController::class, 'show']);
    Route::get('/', [ArticleController::class, 'index']);
});

Route::prefix('employees')->group(function () {
    Route::get('{employee}', [EmployeeController::class, 'show']);
    Route::get('/', [EmployeeController::class, 'index']);
});
