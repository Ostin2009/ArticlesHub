<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'MainController@home');


Route::get('/articles', 'MainController@articles')->name('articles');


Route::get('/articles/{slug}', 'MainController@article')->name('article');


Route::get('/like/increment/{slug}', 'Maincontroller@like_increment');


Route::patch('/like/increment/{id}', 'Maincontroller@update');


Route::post('/comment/check', 'Maincontroller@comment_check');