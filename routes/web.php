<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

$controllerPath = "app\Http\Controllers\\";
// ログイン
Route::get('/', 'UserController@getSignin');
Route::post('/', 'UserController@postSignin')->name('signin');

// サインイン
// Route::get('/singup', 'UserController@getSignUp');
// Route::post('/signup', 'UserController@postSignUp')->name('signup');

// 選択
Route::get('/select', 'ShowSelect');

// ユーザー情報
Route::resource('/userlist', 'UserListController');

// 案件情報
Route::resource('/matterlist', 'MatterListController');

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
