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


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/web/category/list', 'HomeController@listCategories')->name('web.category.list');
Route::get('/web/items/list', 'HomeController@listItems')->name('web.items.list');
Route::get('/web/sub/items/list', 'HomeController@listSubItems')->name('web.sub.items.list');
Route::get('/web/show/item', 'HomeController@showItem')->name('web.show.item');
Route::get('/web/wishlist/add', 'WishlistController@add')->name('web.wishlist.add');
Route::get('/web/wishlist/count', 'WishlistController@getCount')->name('web.wishlist.count');
Route::get('/web/wishlist/list', 'WishlistController@list')->name('web.wishlist.list');
Route::get('/web/wishlist/delete', 'WishlistController@delete')->name('web.wishlist.delete');
Route::get('/web/vendor/profile', 'HomeController@vendorProfile')->name('web.show.vendor');

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
Route::get('/web-users/list', 'UsersController@getWebUsers')->name('admin.web-user.list');
Route::get('/web-users/edit', 'UsersController@getWebUser')->name('admin.web-users.edit');
Route::post('/web-users/edit/submit', 'UsersController@webUserSave')->name('admin.web-users.edit.submit');
Route::post('/web-users/delete', 'UsersController@deleteWebuser')->name('admin.web-users.delete');

// Category Mangment
Route::get('/category', 'CategoryController@index')->name('admin.categories');
Route::get('/category/create', 'CategoryController@loardForm')->name('admin.category.create');
Route::post('/category/submit', 'CategoryController@createCategory')->name('admin.category.submit');
Route::get('/category/edit', 'CategoryController@editCategory')->name('admin.category.edit');
Route::post('/category/edit/submit', 'CategoryController@saveEdit')->name('admin.category.edit.submit');

// Item Managment
Route::get('/items', 'ItemsController@index')->name('admin.items');
Route::get('/items/create', 'ItemsController@loardForm')->name('admin.items.create');
Route::post('/items/submit', 'ItemsController@createItem')->name('admin.items.submit');
Route::get('/items/edit', 'ItemsController@editItem')->name('admin.items.edit');
Route::post('/items/edit/submit', 'ItemsController@saveEdit')->name('admin.items.edit.submit');
Route::post('/items/delete', 'ItemsController@delete')->name('admin.items.delete');

// Vendor Profile
Route::get('/vendor', 'VendorProfileController@index')->name('vendor.vendor');
Route::post('/vendor/save', 'VendorProfileController@save')->name('vendor.save');

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