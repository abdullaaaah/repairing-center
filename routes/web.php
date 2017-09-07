<?php

//landing page

Route::get('/', 'PagesController@home');

Route::get('/welcome', 'PagesController@home')->name('welcome');

Route::get('/about', 'PagesController@about')->name('about');

Route::get('/contact/{success?}', 'PagesController@contact')->name('contact');

Route::get('/faq', 'PagesController@faq')->name('faq');

Route::get('/track', 'PagesController@track')->name('track');

Route::post('/contact', 'PagesController@sendContactMail')->name('send-contact-mail');



//Repairs

Route::get('/repairs/issue', 'RepairsController@issue')->name('repair');

Route::get('/repairs/brands',  'RepairsController@selectBrand')->name('select-brand');

Route::get('/repairs/brand/{brand}/phones', 'RepairsController@selectPhone')->name('select-phone');

Route::post('/repairs/phone/store', 'RepairsController@storePhone')->name('store-phone');

Route::get('/repairs/phone/{phone}/create', 'RepairsController@create')->name('create-repair');

Route::post('/repairs', 'RepairsController@store')->name('store-repair');

Route::get('/thankyou', 'RepairsController@thankyou' );

Route::get('/repairs/{repair}', 'RepairsController@show');

Route::get('/repairs/phone/{phone}', 'RepairsController@showByPhone');

Route::get('/repairs/email/{email}', 'RepairsController@showByEmail');

//track api
Route::get('/repairs/{repair}', 'RepairsController@show')->name('track-by-id');

Route::get('/repairs/track/{repair}', 'RepairsController@trackings');



//Phones API

Route::get('/phones', 'PhonesController@index');

Route::get('/phones/{phone}', 'PhonesController@show');

Route::get('/phones/brand/{brand}', 'PhonesController@showByBrand');

Route::get('/phones/model/{model}', 'PhonesController@showByModel');

//Variations API

Route::get('/variations/phone/{phone}', function($phone) {

  return \App\Phone::find($phone)->variations;

});

//price api

Route::get('/phones/quote/{phone}/{country_code}', function($phone, $country_code) {

  return \App\Phone::find($phone)->Quotes->where('country_code', '=', $country_code);

});



//Auth

//Auth::routes();

Route::get('/admin/login', 'Auth\LoginController@showLoginForm')->name('login');

Route::post('/admin/login', 'Auth\LoginController@login');

Route::post('/admin/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin/home', 'AdminController@home')->name('home-admin');

Route::get('/admin', 'AdminController@home');

Route::get('/admin/inventory', 'AdminController@inventory')->name('inventory-admin');

Route::get('/admin/inventory/brand', 'AdminController@brand_index');

Route::get('/admin/inventory/brand/{phoneMake}', 'AdminController@phoneMake');

//phones

Route::delete('/admin/inventory/phone/{phone}', 'AdminController@deletePhone');

Route::get('/admin/inventory/phone/{phone}', 'AdminController@createVariation');

Route::delete('/admin/inventory/variation/{variation}', 'AdminController@deleteVariation');

Route::post('/admin/inventory/variation', 'AdminController@storeVariation');

//create phones

Route::get('/admin/inventory/phones/create', 'AdminController@createPhone');

Route::post('/admin/inventory/phones', 'AdminController@storePhone');

//manage repairs

Route::get('/admin/manage', 'AdminController@manage')->name('manage-admin');

Route::get('/admin/manage/{country}/new', 'AdminController@indexRepairs')->name('new-repairs');

Route::get('/admin/manage/{country}/ongoing', 'AdminController@indexOngoingRepairs')->name('ongoing-repairs');

Route::get('/admin/manage/{country}/completed', 'AdminController@indexCompletedRepairs')->name('completed-repairs');

Route::get('/admin/manage/repair/{repair}', 'AdminController@showRepair');

Route::post('/admin/trackings', 'AdminController@storeTrackings');


//pricing

Route::get('/admin/inventory/quotes/phone/{phone}', 'AdminController@quotes')->name('manage-pricing');

Route::post('/admin/inventory/quotes', 'AdminController@storeQuote');

//location

Route::get('/admin/location/manage', 'AdminController@indexLocation')->name('manage-location');

Route::get('/admin/location/country/{country}', 'AdminController@viewCountry')->name('manage-country');

Route::post('/admin/location/cities', 'AdminController@storeCity')->name('store-city');

Route::delete('/admin/location/city/{city}', 'AdminController@deleteCity')->name('delete-city');

Route::patch('/admin/location/city/{city}', 'AdminController@editCity')->name('edit-city');

Route::get('/country/{country}/cities', 'RepairsController@getJsonCities');

//paypal routes

Route::post('/getCheckout', 'PaymentsController@getCheckout')->name('getCheckout');

Route::get('/repairs/{repair}/success', 'PaymentsController@getDone')->name('getDone');

Route::get('/getCancel', 'PaymentsController@getCancel')->name('getCancel');

//user

Route::get('/admin/user/{user?}', 'AdminController@settings')->name('settings');

Route::patch('/admin/user/email/{user?}', 'AdminController@editEmail')->name('change-email');

Route::patch('/admin/user/password/{user?}', 'AdminController@editPassword')->name('change-password');
