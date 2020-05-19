<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\UrlGenerator;

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

// User
Route::get('/', 'PagesController@home');
Route::get('/courses', 'PagesController@courses');
Route::get('/courses/{id}', 'PagesController@course');
Route::get('/courses/pay/{course}', 'PagesController@pay');
Route::post('/courses/paid_off/{user}/{id}', 'PagesController@paid_off');
Route::get('/blog', function () {
    return view('user/blog');
});
Route::get('/single_blog', function () {
    return view('user/single_blog');
});
Route::get('/about', function () {
    return view('user/about');
});
Route::get('/contact', function () {
    return view('user/contact');
});

// Admin
Route::get('/admin', function () {
    return view('admin/dashboard');
});
// Route::get('admin/courses', 'CoursesController@index');
// Route::get('admin/courses/create', 'CoursesController@create');
// Route::get('admin/courses/{course}', 'CoursesController@show');
// Route::delete('admin/courses/{course}', 'CoursesController@destroy');
// Route::post('admin/courses', 'CoursesController@store');
// Route::get('admin/courses/{course}/edit', 'CoursesController@edit');
// Route::patch('admin/courses/{course}', 'CoursesController@update');
Route::resource('admin/courses', 'CoursesController');
Route::resource('admin/users', 'UsersController');
Route::delete('admin/invoices/{invoice}', 'CoursesController@destroy');
Route::resource('admin/invoices', 'InvoicesController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
