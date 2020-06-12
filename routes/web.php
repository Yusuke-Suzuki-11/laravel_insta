<?php

use Illuminate\Support\Facades\Route;

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
Route::get("/", "PostsController@index");

Auth::routes();



// ユーザー編集画面
Route::get("/users/edit", "UsersController@edit");
Route::post("/users/update", "UsersController@update");

// ユーザー詳細画面
Route::get('users/{user_id}',"UsersController@show");

// 投稿画面
Route::get("posts/new", "PostsController@new")->name("new");
Route::post("/posts","PostsController@store");

// 投稿削除
Route::get("postsdelete/{post_id}", "PostsController@destroy");

// いいね機能
Route::get('/posts/{post_id}/likes', 'LikesController@store');
//いいね取消処理
Route::get('/likes/{like_id}', 'LikesController@destroy');

// コメント投稿
Route::post('/posts/{comment_id}/comments', 'CommentsController@store');
//コメント取消処理
Route::get('/comments/{comment_id}', 'CommentsController@destroy');
