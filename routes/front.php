<?php
/**
 * Created by PhpStorm.
 * User: Asad
 * Date: 19.08.2019
 * Time: 16:42
 */

Route::view('/advertising/banners-ad', 'site.pages.static.banners_ad');
Route::view('/advertising/cooler-ad', 'site.pages.static.cooler_ad');
Route::view('/advertising', 'site.pages.static.home');
Route::view('/advertising/info-flayers', 'site.pages.static.info_flayers');
Route::view('/advertising/package-ad', 'site.pages.static.package_ad');
Route::view('/advertising/promo', 'site.pages.static.promo');
Route::view('/advertising/tablets-ad', 'site.pages.static.tablets_ad');
Route::view('/advertising/tv-videos', 'site.pages.static.tv_videos');
Route::view('/advertising/visit-card', 'site.pages.static.visit_card');

Route::redirect('/dosug', '/leisure');
Route::redirect('/magaziny', '/the-shops');
Route::redirect('/uslugi', '/Services');
Route::redirect('/dlya-biznesa', '/for-business');
Route::redirect('/servisy', '/for-citizens');
Route::namespace('Site')->group(function () {
    Route::get('/ban2', 'BannerController@index');
});

Route::middleware('needsList')->namespace('Site')->group(function () {
    Route::get('/cgu-info', 'CguController@cguInfo')->name('home.cgu.info');
    Route::get('/cgu-info/{id}', 'CguController@cguCategory')->name('home.cgu.info.category');
    Route::get('/cgu-ad', 'CguController@cguAd')->name('home.cgu.ad');
    Route::get('/cgu-ad/{id}', 'CguController@cguCategory')->name('home.cgu.ad.category');
});

Route::middleware('needsList')->name('site.')->namespace('Site')->group(function () {
    // Studio static page routes
    Route::view('/studiya', 'studio.home', ['page' => 'home']);
    Route::view('/site', 'studio.site.index', ['page' => 'site']);
    Route::view('/site/lange', 'studio.site.landing', ['page' => 'site.landing']);
    Route::view('/site/internet-magazin', 'studio.site.eshop', ['page' => 'site.eshop']);
    Route::view('/site/korp', 'studio.site.korp', ['page' => 'site.korp']);
    Route::view('/development/site/catalog', 'studio.development.catalog', ['page' => 'dev.site.catalog']);
    Route::view('/development/mobile-app/android', 'studio.development.android', ['page' => 'dev.mobile.android']);
    Route::view('/development/mobile-app/ios', 'studio.development.ios', ['page' => 'dev.mobile.ios']);
    Route::view('/development/bot', 'studio.development.bot', ['page' => 'dev.bot']);
    Route::view('/prodvizhenie-seo', 'studio.seo.index', ['page' => 'seo']);
    Route::view('/prodvizhenie-seo/optimizatsiya', 'studio.seo.optimization', ['page' => 'seo.optimization']);
    Route::view('/smm', 'studio.smm', ['page' => 'smm']);
    Route::view('/lets-talk', 'studio.contacts', ['page' => 'contacts']);

    // Blog route
    Route::get('/blog', 'BlogController@index')->name('blog.index');
    Route::get('/blog/{params}', 'BlogController@blog')->where('params', '.+')->name('blog.main');

    // Account routes
    Route::get('/account', 'AccountController@index')->name('account.index');
    Route::post('/account/contractor/personal', 'AccountController@savePersonalContractor')->name('account.contractor.personal.save');
    Route::get('/account/professional', 'AccountController@professional')->name('account.contractor.professional');
    Route::post('/account/professional', 'AccountController@saveProfessional');
    Route::post('/account/customer/company', 'AccountController@saveCompany')->name('account.customer.company.save');
    Route::get('/account/personal', 'AccountController@personalCustomer')->name('account.customer.personal');
    Route::post('/account/personal', 'AccountController@personalCustomerSave');

    // Tenders routes
    Route::get('/tenders/create', 'TenderController@create')->name('tenders.common.create');
    Route::post('/tenders/create', 'TenderController@store');

    // Catalog routes
    Route::get('/', 'HomeController@index')->name('catalog.index');
    Route::get('/contractors', 'ContractorsController@index')->name('contractors.index');
    Route::get('/contractors/{slug}', 'ContractorsController@contractor')->name('contractors.show');

    Route::get('/{params}', 'ContractorsController@category')->where('params', '.+')->name('catalog.main');
    Route::post('/search', 'CatalogController@search')->name('catalog.search');
});


