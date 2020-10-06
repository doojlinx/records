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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin routes

Route::get('/dashboard', 'InvestmentController@index');
Route::get('/create', 'InvestmentController@create');
Route::post('/create', 'InvestmentController@store');
Route::get('/dashboard/show/{id}', 'InvestmentController@show');
Route::get('/dashboard/edit/{id}', 'InvestmentController@edit');
Route::patch('/dashboard/edit/upload/{id}', 'InvestmentController@update');

Route::get('/investment-plan', 'AdonsController@iplan');
Route::get('/investment-duration', 'AdonsController@iduration');
Route::get('/investment-status', 'AdonsController@istatus');
Route::get('/branch', 'AdonsController@ibranch');

Route::post('/investment-duration', 'AdonsController@duration_store');
Route::delete('/investment-duration/{id}', 'AdonsController@duration_destroy');

Route::post('/branch', 'AdonsController@branch_store');
Route::delete('/branch/{id}', 'AdonsController@branch_destroy');

Route::post('/investment-plan', 'AdonsController@plan_store');
Route::delete('/investment-plan/{id}', 'AdonsController@plan_destroy');

Route::post('/investment-status', 'AdonsController@status_store');
Route::delete('/investment-status/{id}', 'AdonsController@status_destroy');


Route::get('/dashboard/{id}', 'InvestmentController@fshow');
Route::patch('/dashboard/update/{id}', 'InvestmentController@fstore');

Route::get('/file-upload', 'FileController@index');
Route::post('/file-upload', 'FileController@store');
Route::delete('/file-upload/{id}', 'FileController@destroy');

Route::resource('/export', 'ExportController');

Route::get('/users', 'UserController@index');
Route::delete('/users/{id}', 'UserController@destroy');
Route::get('/user/{id}/edit', 'UserController@edit');


Route::get('/read', function(){
    auth()->user()->unReadNotifications->markAsRead();

    return redirect()->back();
});
