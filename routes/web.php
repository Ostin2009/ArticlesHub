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

Route::get('/', 'MainController@home');


Route::get('/articles', 'MainController@articles')->name('articles');


Route::get('/articles/{slug}', 'MainController@article')->name('article');


Route::get('/like/increment/{slug}', 'MainController@like_increment');


Route::patch('/like/increment/{id}', 'MainController@update');


Route::post('/comment/check', 'CommenController@comment_check');