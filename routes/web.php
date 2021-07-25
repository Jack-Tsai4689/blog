<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function(){
	Route::get('login', [UsersController::class, 'login'])->name('auth.login');
	Route::get('register', [UsersController::class, 'register'])->name('auth.register');
	Route::post('login', [UsersController::class, 'save'])->name('auth.save');	
});
Route::group(['prefix' => 'article'], function(){
	Route::get('/', [MainController::class, 'article'])->name('articles');
	Route::get('/{id}', [MainController::class, 'detail'])->name('article');
	Route::get('/create', [MainController::class, 'create'])->name('article.create');
	Route::get('/save', [MainController::class, 'save'])->name('article.save');
});