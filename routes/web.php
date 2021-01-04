<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about','FrontendController@about');



// categoryColntroller route
Route::get('/add/category','CategoryController@addcategory');
Route::post('/add/category/post','CategoryController@addcategorypost');
Route::get('/update/category/{id}','CategoryController@updatecategory');
Route::post('/update/category/post','CategoryController@updatecategorypost');
Route::get('/delete/category/{id}','CategoryController@deletecategory');
Route::get('/restore/category/{id}','CategoryController@restoreecategory');
Route::get('/hdelete/category/{id}','CategoryController@harddelategory');


// profileColntroller route

Route::get('/profile','ProfileController@index');
Route::post('/profile/post','ProfileController@profilepost');
Route::post('/profile/password','ProfileController@profilepassword');


Auth::routes(['verify'=>true]);

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
