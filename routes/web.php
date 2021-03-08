<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\DashboardController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\web\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;

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


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', [DashboardController::class, 'home']);
Route::get('/articles', [DashboardController::class, 'articles']);
Route::get('/categories', [DashboardController::class, 'categories']);
Route::get('/articles/categories/{id}', [DashboardController::class, 'articleByCategorie']);


Route::get('/articles/{id}', [DashboardController::class, 'lire']);


Route::middleware('auth')->group(function () {

    Route::get('/user', [AuthController::class, 'getUser']);

    

    Route::post('/article', [ArticlesController::class, 'store']);
    
    // Route::post('/categorie', [CategoriesController::class, 'store']);
    
    Route::post('/comments', [CommentsController::class, 'store']);

});
