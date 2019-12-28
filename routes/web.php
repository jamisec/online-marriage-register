<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.layouts.admin_main');
});

Route::get('/admin-form', function () {
    return view('admin.pages.form');
});


Route::resource('/govt/nids','NidController');
Route::resource('/govt/kazis','KaziController');
// ->middleware(['auth','can:Access-SuperAdmin'])

Route::get('govt/kazi/marriage','MarriageController@register');
Route::post('govt/kazi/marriage','MarriageController@postRegister');
Route::get('govt/kazi/marriage/witness','MarriageController@witness');
