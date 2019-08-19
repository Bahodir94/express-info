<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 16:42
 */


Route::middleware('checkIsAdmin')->prefix('admin')->name('admin.')->namespace('Admin')->group(function (){
    Route::get('/', 'DashboardController@index')->name('index');
});