<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;



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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/user', [AuthController::class, 'getUser']);

    Route::get('/articles/{id}', [ArticlesController::class, 'show']);
    Route::get('/articles', [ArticlesController::class, 'index']);
    Route::get('/articles/categories/{id}', [ArticlesController::class, 'articleByCategorie']);

    Route::post('/article', [ArticlesController::class, 'store']);
    
    
    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::post('/categorie', [CategoriesController::class, 'store']);
    
    Route::post('/comments', [CommentsController::class, 'store']);



});
