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


Route::get('/stamp', function () {
    return view('stamp.stamp');
});


Route::get('/check', function () {
    return view('stamp.check');
});

Route::get('/stampEnd', function () {
    return view('stamp.stamp');
});

// Route::get('/timelist', function () {
//     return view('timeList');
// });

// Route::post('/stamp', 'StampController@store')->name('stamp.store');
// Route::resource('stamp', 'StampController');

// 勤務開始・退勤時
Route::post('/stamp', 'Work_timeController@store')->name('stamp.store');

// 退勤が押されず、勤務開始が連続して押された時のRoute
Route::post('/check', 'CheckController@store')->name('stamp.check');

// Route::post('/stampEnd', 'End_timeController@store')->name('stampEnd.store');
// Route::put('/stamp', 'Work_timeController@update')->name('stamp.update');


Route::get('/startTimeModify', function () {
    return view('startTimeModify');
});

Route::get('/endTimeModify', function () {
    return view('endTimeModify');
});

// ログイン認証のルーティング分解
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('can:admin');
// Route::post('register', 'Auth\RegisterController@register')->middleware('can:admin');

// 管理者のみ新規登録ができる
Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
});

Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/timelist', 'Work_timeController@showTimeList')->name('timelist.index');
Route::get('/personaltimelist/{id}', 'Work_timeController@showPersonalTimeList')->name('timelist.indexPersonal');

