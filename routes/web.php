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


//ドリル新規登録
Route::get('/drills/new', 'DrillsController@new')->name('drills.new'); //画面表示
Route::post('/drills/new', 'DrillsController@create')->name('drills.create'); //新規登録ボタンで登録

//ドリル一覧表示
Route::get('/drills', 'DrillsController@index')->name('drills');

//ドリルスタート
Route::get('/drills/{id}', 'DrillsController@lesson')->name('drills.lesson');

//ドリル編集
Route::get('/drills/{id}/edit', 'DrillsController@edit')->name('drills.edit');
Route::post('/drills/{id}/edit','DrillsController@update')->name('drills.update');

//ドリルを削除
Route::post('/drills/{id}/delete', 'DrillsController@delete')->name('drills.delete');

//会員登録とログインに必要
Auth::routes();

//ホーム画面にアクセス
Route::get('/home', 'HomeController@index')->name('home');