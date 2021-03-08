<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\DashboardController;

use App\Http\Controllers\web\AuthController;
use App\Http\Controllers\web\ArticlesController;
use App\Http\Controllers\web\CategoriesController;
use App\Http\Controllers\web\CommentsController;

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

// get login form
Route::get('register', [AuthController::class, 'formSignUp'])->name('register');
Route::get('login', [AuthController::class, 'formSignIn'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/', [DashboardController::class, 'home']);
Route::get('/articles', [DashboardController::class, 'articles']);
Route::get('/categories', [DashboardController::class, 'categories']);
Route::get('/articles/categories/{id}', [DashboardController::class, 'articleByCategorie']);


Route::middleware('auth')->group(function () {
    
    Route::get('/user', [AuthController::class, 'getUser']);
    
    Route::get('/article', [DashboardController::class, 'form_article'])->name('article');
    Route::post('/article', [ArticlesController::class, 'store'])->name('article.post');
    
    Route::get('/articles/{id}', [DashboardController::class, 'lire']);

    Route::post('/comments', [CommentsController::class, 'store'])->name('comments.post');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    
});

