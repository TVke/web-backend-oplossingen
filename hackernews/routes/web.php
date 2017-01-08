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

Auth::routes();

Route::get('/', 'ArticleController@index')->name('article_overview');

Route::get('/new', 'ArticleController@addForm')->name('article_add_form');

Route::put('/add', 'ArticleController@add')->name('article_add');

Route::get('/edit/{article}', 'ArticleController@editForm')->name('article_edit_form');

Route::patch('/update/{article}','ArticleController@edit')->name('article_edit');

Route::get('/confirm/{article}','ArticleController@confirm')->name('article_confirm');

Route::delete('/delete/{article}','ArticleController@delete')->name('article_delete');

Route::get('/comment/{article}', 'CommentController@commentForm')->name('comment_overview');

Route::put('/comment/{article}/add', 'CommentController@add')->name('comment_add');

Route::get('/comment/{comment}/edit', 'CommentController@editForm')->name('comment_edit_form');

Route::get('/comment/{comment}/edit/confirm','CommentController@editConfirm')->name('comment_edit_confirm');

Route::patch('/comment/{comment}/update','CommentController@update')->name('comment_edit');

Route::get('/comment/{article}/confirm/{comment}','CommentController@confirm')->name('comment_confirm');

Route::delete('/comment/{comment}/delete','CommentController@delete')->name('comment_delete');

Route::patch('/up/{article}','VoteController@up')->name('vote_up');

Route::patch('/down/{article}','VoteController@down')->name('vote_down');

/*Route::resource('article','ArticleController');*/
/*Route::resource('comment','CommentController');*/