<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::namespace('App\Http\Controllers')->middleware([
    'web',
    InitializeTenancyByDomainOrSubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Auth::routes();

    Route::view('/', 'welcome');

    Route::resource('companies', 'CompanyController')->middleware('auth');

    Route::resource('customers', 'CustomerController')->middleware('auth');

    Route::resource('cars', 'CarController')->middleware('auth');

    Route::resource('cars.rents', 'RentController')->except('index', 'show', 'edit', 'destroy')->middleware('auth');

    Route::resource('rents', 'RentController')->only('index', 'edit', 'destroy')->middleware('auth');

    Route::resource('documents', 'DocumentController')->only('destroy')->middleware('auth');

    Route::view('home', 'home')->name('home')->middleware('auth');
});
