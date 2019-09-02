<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 16:42
 */

Route::middleware('needsList')->name('site.')->namespace('Site')->group(function() {
    // Catalog routes
    Route::get('/catalog', 'CatalogController@index')->name('catalog.index');
    Route::get('/catalog/category/{id}', 'CatalogController@category')->name('catalog.category');
    Route::get('/catalog/company/{id}', 'CatalogController@company')->name('catalog.company');
});
