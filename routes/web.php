<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin.layouts.admin_main');
});


Route::resource('/govt/nids','NidController');
Route::resource('/govt/kazis','KaziController');
// ->middleware(['auth','can:Access-SuperAdmin'])

Route::get('/govt/kazi/marriage','MarriageController@register')->middleware(['auth','can:Access-Admin']);
Route::post('/govt/kazi/marriage','MarriageController@PostRegister')->middleware(['auth','can:Access-Admin']);
Route::get('/govt/kazi/marriage/witness','MarriageController@witness')->middleware(['auth','can:Access-Admin']);
Route::post('/govt/kazi/marriage/witness','MarriageController@PostWitness')->middleware(['auth','can:Access-Admin']);
Route::get('/govt/kazi/marriage/religion','MarriageController@religion')->middleware(['auth','can:Access-Admin']);
Route::post('/govt/kazi/marriage/religion','MarriageController@PostReligion')->middleware(['auth','can:Access-Admin']);
Route::get('/govt/kazi/marriage/payment','MarriageController@payment')->middleware(['auth','can:Access-Admin']);
Route::post('/govt/kazi/marriage/payment','MarriageController@PostPayment')->middleware(['auth','can:Access-Admin']);


Auth::routes();
// Route::get('/login', 'Auth\LoginController@showLoginForm');
// Route::post('/login', 'Auth\LoginController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
