<?php

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

Route::group(['middleware' => ['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::get('historic', 'BalanceController@historic')->name('admin.historic');

    Route::post('transferConfirm', 'BalanceController@transferConfirm')->name('transfer.confirm');
    Route::post('transfer', 'BalanceController@transferReceiver')->name('transfer.receiver');
    Route::get('transfer', 'BalanceController@transfer')->name('balance.transfer');

    Route::post('withdraw', 'BalanceController@withdrawConfirm')->name('withdraw.confirm');
    Route::get('withdraw', 'BalanceController@withdraw')->name('balance.withdraw');

    Route::post('deposit', 'BalanceController@depositConfirm')->name('deposit.confirm');
    Route::get('deposit', 'BalanceController@deposit')->name('balance.deposit');

    Route::get('balance', 'BalanceController@index')->name('admin.balance');

    Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();
