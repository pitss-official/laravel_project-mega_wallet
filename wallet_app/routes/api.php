<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::post('/process/login',function (){
//
//});
Route::post('/wallet/transaction', 'MoneyController@test');

Route::post('/transaction/add/money', 'MoneyController@store');

Route::get('/my/transactions', 'MoneyController@index');

Route::get('/fetch/other/users', 'MoneyController@edit');

Route::post('/transaction/send/money', 'MoneyController@update');

Route::post('/create/new/vouchers', 'VoucherController@create');

Route::post('/wallet/redeem/voucher', 'VoucherController@redeem');

Route::post('/transaction/schedule/payment', 'PendingController@schedulePayment');
Route::get('/wallet/pending/payments', 'PendingController@pendingPayments');

Route::post('/wallet/request/loan', 'LoanController@create');
Route::get('/get/loan/requests', 'LoanController@getLoanRequests');
Route::get('/all/loan/requests', 'LoanController@index');
Route::post('/approve/loan', 'LoanController@approve');
Route::post('/deny/loan', 'LoanController@deny');

Route::post('/generate/gift/card', 'GiftController@create');
Route::get('/find/gift/cards', 'GiftController@findGiftCards');
Route::post('/redeem/gift/card', 'GiftController@redeem');

Route::post('/add/contact', 'ContactController@create');

Route::get('/get/current/balance', 'MoneyController@getCurrentBalance');
Route::get('/get/total/txns', 'MoneyController@getTotalTxns');
Route::get('/get/total/pending/requests', 'PendingController@countPendingRequest');
Route::get('/get/available/gift/cards', 'GiftController@countGiftCards');

Route::get('/get/user/details', function (){
    $user = \App\User::find(auth()->user()->id);
    return $user;

});


Route::post('/change/user/details', 'HomeController@profileUpdate');

//Route::get('/get/user/id', '');
