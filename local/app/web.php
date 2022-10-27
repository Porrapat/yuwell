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
Route::middleware(['auth'])->group(function () {

    Route::resource('/', 'IndexController');
    Route::resource('/question', 'QuestionController');
    Route::get('/question-reply', 'QuestionController@question_reply');
    Route::get('search', 'QuestionController@search');
    Route::resource('/enroll', 'RegisterController');
    Route::get('/show/{id}', 'RegisterController@show1');
    Route::delete('deletedata/{id}', 'RegisterController@destroy');

    Route::get('/detail-register', 'RegisterController@detail_register');
    Route::get('/editstatus/{id}', 'RegisterController@editstatus');
    Route::put('/updatestatus/{id}', 'RegisterController@updatestatus');

    Route::get('/report', 'RegisterController@report');
    Route::resource('/technical', 'TechnicalController');
    Route::resource('/challenge', 'ChallengeController');
    Route::get('/vat', 'ChallengeController@vat');
    Route::get('/vat-edit/{id}', 'ChallengeController@edit_vat');

    Route::put('/updatevat/{id}', 'ChallengeController@updatevat');


    Route::get('/visit', 'ChallengeController@visit');

    Route::resource('/product', 'ProductController');
    Route::get('/dt_commission_matching', 'ProductController@dt_commission_matching')->name('dt_commission_matching');

    Route::get('export', 'MyController@export')->name('export');

     // select
  Route::post('/provinces','QuestionController@provinces')->name('provinces');
  Route::post('/amphures','QuestionController@amphures')->name('amphures');
  Route::post('/zipcodes','QuestionController@zipcodes')->name('zipcodes');
  Route::post('/region','QuestionController@region')->name('region');
  Route::post('/regproducts','RegisterController@register_products')->name('regproducts');

  Route::post('/addvat','QuestionController@addvat')->name('addvat');

});
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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
