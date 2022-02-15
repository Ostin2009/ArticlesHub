<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CommentController;


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

Route::get('/', 'MainController@main');


Route::get('/articles', 'MainController@articles')->name('articles');


Route::get('/user/articles', 'MainController@user_articles')->middleware('auth');


Route::get('/articles/{slug}', 'MainController@article')->name('article');


Route::get('/user/articles/{slug}', 'MainController@article')->middleware('auth');


Route::get('/view/increment/{slug}', 'MainController@view_increment');


Route::patch('/like/increment/{id}', 'MainController@update')->middleware('auth');


Route::post('/comment/check', 'CommentController@comment_check');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
