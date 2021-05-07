<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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
Route::get('/user/check', function (Request $request) {
    return Auth::check();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return Auth::user();
});

Route::prefix('articles')->group(function () {
    Route::get('{article}', [ArticleController::class, 'show']);
    Route::get('/', [ArticleController::class, 'index']);
});

Route::prefix('sections')->group(function () {
    Route::get('/', [SectionController::class, 'index']);
    Route::get('{section}/articles', [SectionController::class, 'articles']);
});

Route::prefix('users')->group(function () {
    Route::get('{user}', [UserController::class, 'show']);
    Route::put('{user}', [UserController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('{user}', [UserController::class, 'destroy'])->middleware('auth:sanctum');
    Route::get('/', [UserController::class, 'index']);
    Route::post('/', [UserController::class, 'store'])->middleware('auth:sanctum');
});
