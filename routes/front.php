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
Route::view('/home', 'studio.home');
Route::view('/site', 'studio.site.index');
Route::view('/site/lange', 'studio.site.landing');
Route::view('/site/internet-magazin', 'studio.site.eshop');
Route::view('/site/korp', 'studio.site.korp');
Route::view('/development/site/catalog', 'studio.development.catalog');
Route::view('/development/mobile-app/android', 'studio.development.android');
Route::view('/development/mobile-app/ios', 'studio.development.ios');
Route::view('/development/bot', 'studio.development.bot');
Route::view('/prodvizhenie-seo', 'studio.seo.index');
Route::view('/prodvizhenie-seo/optimizatsiya', 'studio.seo.optimization');
Route::view('/smm', 'studio.smm');
Route::view('/lets-talk', 'studio.contacts');

Route::redirect('/dosug', '/leisure');
Route::redirect('/magaziny', '/the-shops');
Route::redirect('/uslugi', '/Services');
Route::redirect('/dlya-biznesa', '/for-business');
Route::redirect('/servisy', '/for-citizens');
Route::namespace('Site')->group(function() {
    Route::get('/ban2', 'BannerController@index');
});

Route::middleware('needsList')->namespace('Site')->group(function() {
	Route::get('/cgu-info', 'CguController@cguInfo')->name('home.cgu.info');
	Route::get('/cgu-info/{id}', 'CguController@cguCategory')->name('home.cgu.info.category');
	Route::get('/cgu-ad', 'CguController@cguAd')->name('home.cgu.ad');
	Route::get('/cgu-ad/{id}', 'CguController@cguCategory')->name('home.cgu.ad.category');
});

Route::middleware('needsList')->name('site.')->namespace('Site')->group(function() {
    // Catalog routes
    Route::get('/', 'CatalogController@index')->name('catalog.index');
    Route::get('/{params}', 'CatalogController@catalog')->where('params', '.+')->name('catalog.main');
    Route::post('/search', 'CatalogController@search')->name('catalog.search');
});
