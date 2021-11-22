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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();  //Utilizar geralmente o facades.

Route::get('/home', function () {
    return view('home');
})->name('home')/* ->middleware('auth') */;

Route::resource('companies', 'CompanyController');

Route::resource('customers', 'CustomerController');

Route::resource('cars', 'CarController');

Route::resource('cars.rents', 'RentController')->except('index', 'show', 'edit', 'destroy');

Route::resource('rents', 'RentController')->only('index', 'edit', 'destroy');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
