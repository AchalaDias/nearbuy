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



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
// Auth 
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

// Users Managment
Route::get('/users', 'UsersController@index')->name('admin.users');
Route::get('/users/create', 'UsersController@loardForm')->name('admin.users.create');
Route::post('/users/submit', 'UsersController@createUser')->name('admin.user.submit');
Route::get('/users/edit', 'UsersController@loardEdit')->name('admin.users.edit');
Route::post('/users/edit/submit', 'UsersController@saveEdit')->name('admin.user.edit.submit');
Route::post('/users/delete', 'UsersController@delete')->name('admin.users.delete');


// Category Mangment
Route::get('/category', 'CategoryController@index')->name('admin.categories');
Route::get('/category/create', 'CategoryController@loardForm')->name('admin.category.create');
Route::post('/category/submit', 'CategoryController@createCategory')->name('admin.category.submit');



// Password reset routes
//   Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//   Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//   Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
//   Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
// Route::group( [ 'middleware' => 'auth' ], function()
// {
//     Route::group(['middleware' => ['is-admin'], 'prefix' => 'admin'], function () 
//     {
//         Route::get('home', 'HomeController@test')->name('home');   
//     });

//     Route::get('/', function () {
//         return view('home');
//     });
// });