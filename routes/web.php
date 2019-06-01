<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Index
Route::get('question', 'QuestionController@index');

// Store Question
Route::post('question', 'QuestionController@store');
// Question Detail
Route::get('question/{id}', 'QuestionController@detail');
// Comment from Detail Question
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
// Reply to Comment from Detail Question
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');