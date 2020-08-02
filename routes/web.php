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

Route::get('/', function () {
    return view('welcome');
});

//会員登録とログインに必要
Auth::routes();

//ドリル新規登録
Route::get('/drills/new', 'DrillsController@new')->name('drills.new'); //画面表示
Route::post('/drills/new', 'DrillsController@create')->name('drills.create'); //新規登録ボタンで登録

//ドリル一覧表示
Route::get('/drills', 'DrillsController@index')->name('drills');

//ドリルスタート
Route::get('/drills/{id}', 'DrillsController@lesson')->name('drills.lesson')->middleware('login');

//ドリル編集
Route::get('/drills/{id}/edit', 'DrillsController@edit')->name('drills.edit');
Route::post('/drills/{id}/edit','DrillsController@update')->name('drills.update');

//ドリルの答えを確認
Route::get('/drills/{id}/answer', 'DrillsController@answer')->name('drills.answer')->middleware('login');;

//ドリルを削除
Route::post('/drills/{id}/delete', 'DrillsController@delete')->name('drills.delete');

//マイページ表示
Route::get('/{id}/mypage', 'MypageController@show')->name('mypage.show');



//自分が投稿したドリル表示
Route::get('/mydrill', 'MypageController@mydrill')->name('mypage.mydrill');
//お気にりドリル表示画面
Route::get('/favdrill', 'MypageController@myfav')->name('mypage.myfav');