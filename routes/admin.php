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

    // Cgu Catalog Routes
    Route::resource('/cgucatalogs', 'CguCatalogController');

    // Handbook Category Routes
    Route::resource('/hcategories', 'HandbookCategoryController');
    Route::get('/hcategories/{id}/removeImage', 'HandbookCategoryController@removeImage')->name('handbookcategories.remove.image');
    Route::post('/hcategories/position', 'HandbookCategoryController@changePosition')->name('handbookcategories.change.position');
    Route::get('/hcategories/{id}/handbooks', 'HandbookCategoryController@handbooks')->name('handbookcategories.handbooks');

    // Companies Routes
    Route::resource('/companies', 'CompanyController');
    Route::get('/companies/{id}/removeImage', 'CompanyController@removeImage')->name('companies.remove.image');
    Route::post('/companies/position', 'CompanyController@changePosition')->name('companies.change.position');

    // Users routes
    Route::resource('/users', 'UsersController');
    Route::post('/users/{id}/changePassword', 'UsersController@changePassword')->name('users.change.password');
});
