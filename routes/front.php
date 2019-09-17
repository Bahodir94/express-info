<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 16:42
 */

Route::get('/cgu/info', 'Site\CguController@cguInfo')->name('home.cgu.info');
Route::get('/cgu/info/{id}', 'Site\CguController@cguCategory')->name('home.cgu.info.category');
Route::get('/cgu/ad', 'Site\CguController@cguAd')->name('home.cgu.ad');
Route::get('/cgu/ad/{id}', 'Site\CguController@cguCategory')->name('home.cgu.ad.category');

Route::middleware('needsList')->name('site.')->namespace('Site')->group(function() {
    // Catalog routes
    Route::get('/', 'CatalogController@index')->name('catalog.index');
    Route::get('/{params}', 'CatalogController@catalog')->where('params', '.+')->name('catalog.main');
    Route::post('/search', 'CatalogController@search')->name('catalog.search');
});
