<?php

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
Route::resource('/', 'FrontendController');

// Route::get('/', function () {
//     return view('welcome');
// });


// fronend
Route::get('switchlang/{lang}','FrontendController@switchLang');

// Route::get('/index', 'FrontendController@index');
Route::get('/about', 'FrontendController@about');
Route::get('/product', 'FrontendController@product');
Route::get('/product-list', 'FrontendController@product_list');

Route::get('/product-detail', 'FrontendController@product_detail');
Route::get('/contact', 'FrontendController@contact');

Route::get('/news', 'FrontendController@news');
Route::get('/news-detail/{id}', 'FrontendController@news_detail');
Route::get('/video', 'FrontendController@video');
Route::get('/industry', 'FrontendController@industry');


Route::get('/privacy', 'FrontendController@privacy');
Route::get('/resultsearch', 'FrontendController@resultSearch');
Route::get('/service-detail', 'FrontendController@service_detail');
Route::get('/service-sub', 'FrontendController@service_sub');
Route::get('/product-sub', 'FrontendController@product_sub');
Route::get('/product-sub2', 'FrontendController@product_sub2');

Route::get('/terms', 'FrontendController@terms');

Route::get('/warranty', 'FrontendController@warranty');
Route::post('/warranty', 'FrontendController@warranty_store');
Route::get('/service-report', 'FrontendController@serviceReport');
Route::post('/service-report', 'FrontendController@serviceReport_store');
Route::get('/service-report-check', 'FrontendController@serviceReportCheck');

// backend
Route::resource('/admin/banner', 'BannerController');
Route::resource('/admin/video', 'VideoController');
Route::resource('/admin/about', 'AboutUsController');
Route::resource('/admin/overview', 'OverviewController');
Route::resource('/admin/timeline', 'TimelineController');
Route::resource('/admin/country', 'CountryController');

Route::resource('/admin/certificates', 'CertificatesController');
Route::resource('/admin/news', 'NewsController');
Route::resource('/admin/sector', 'SectorController');

Route::resource('/admin/contact', 'ContactController');
Route::resource('/admin/product-type', 'ProductTypeController');
Route::resource('/admin/product-collection', 'ProductCollectionController');
Route::resource('/admin/product', 'ProductController');
Route::resource('/admin/services', 'ServicesController');

Route::resource('/admin/repair-status', 'RepairStatusController');
Route::post('/admin/serial-number/import-excel', 'SerialNumberController@importExcel');
Route::resource('/admin/serial-number', 'SerialNumberController');
Route::get('/admin/warranty/print-excel', 'WarrantyController@printExcel');
Route::resource('/admin/warranty', 'WarrantyController');
Route::resource('/admin/service-report', 'ServiceReportController');
Route::get('/admin/service-report/{id}/edit-only-status', 'ServiceReportController@editOnlyStatus');
Route::patch('/admin/service-report/{id}/update-only-status', 'ServiceReportController@updateOnlyStatus');



Route::get('/clc', function() {

    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    // Artisan::call('optimize');
    // Artisan::call('clear-compiled');
        // Artisan::call('view:clear');
        // session()->forget('key');
    return "Cleared!";

 });
