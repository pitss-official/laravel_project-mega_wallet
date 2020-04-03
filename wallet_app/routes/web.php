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
    if(auth()->user()){
        return redirect('/home');
    }
    return view('landing');
});
Auth::routes();


Route::get('/{any}', 'NavigationController@index')->where('any', '.*');

Route::view('/layout', 'layouts.layout');



//-----  Navigation routes start

//Route for dashboard
Route::get('/home', 'NavigationController@index')->name('home');

Route::resource('money', 'MoneyController');
Route::get('/money/1/send', 'MoneyController@edit');

//Route::get('/send/money', '');
