<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 16:42
 */


Route::middleware('checkIsAdmin')->prefix('admin')->name('admin.')->namespace('Admin')->group(function (){
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('index');
    // Cgu Site Routes
    Route::resource('/cgusites', 'CguSiteController');
    Route::get('/cgusites/{id}/image', 'CguSiteController@removeImage')->name('cgusites.remove.image');
    Route::post('/cgusites/change/position', 'CguSiteController@changePosition')->name('cgusites.change.position');

    // Cgu Category Routes
    Route::resource('/cgucategories', 'CguCategoryController');
    Route::get('/cgucategories/{id}/image', 'CguCategoryController@removeImage')->name('cgucategories.remove.image');
    Route::get('/cgucategories/{id}/sites', 'CguCategoryController@sites')->name('cgucategories.sites');
    Route::post('/cgucategories/change/position', 'CguCategoryController@changePosition')->name('cgucategories.change.position');

    // Handbook Category Routes
    Route::resource('/handbookcategories', 'HandbookCategoryController');
    Route::get('/handbookcategories/{id}/removeImage', 'HandbookCategoryController@removeImage')->name('handbookcategories.remove.image');
    Route::post('/handbookcategories/position', 'HandbookCategoryController@changePosition')->name('handbookcategories.change.position');
    Route::get('/handbookcategories/{id}/handbooks', 'HandbookCategoryController@handbooks')->name('handbookcategories.handbooks');

    // Handbook Routes
    Route::resource('/handbooks', 'HandbookController');
    Route::get('/handbooks/{id}/removeImage', 'HandbookController@removeImage')->name('handbooks.remove.image');
    Route::post('/handbooks/position', 'HandbookController@changePosition')->name('handbooks.change.position');
});
