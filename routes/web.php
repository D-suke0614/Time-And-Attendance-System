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

// Route::post('/stamp', 'StampController@store')->name('stamp.store');
// Route::resource('stamp', 'StampController');

Route::post('/stamp', 'Work_timeController@store')->name('stamp.store');
