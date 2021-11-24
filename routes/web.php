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

use App\Models\Tenant;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomainOrSubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();  //Utilizar geralmente o facades.

Route::get('/home', function () {
    return view('home');
})->name('home')/* ->middleware('auth') */;

Route::resource('companies', 'CompanyController');

Route::resource('customers', 'CustomerController');

Route::resource('cars', 'CarController');

Route::resource('cars.rents', 'RentController')->except('index', 'show', 'edit', 'destroy');

Route::resource('rents', 'RentController')->only('index', 'edit', 'destroy');



// Route::get('testeste', function () {

//     // Tenant::all()->runForEach(function () {
//     //     return factory(User::class)->create();
//     // });
//     $tenant = Tenant::create(['id' => 'saga-cars-foo']);
//     $tenant->domains()->create(['domain' => 'foo.localhost']);
//     dd($tenant->domains);
// });


Route::middleware([
    'web',
    InitializeTenancyByDomainOrSubdomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return 'Esta é sua aplicação multi-tenant. O id do tenant atual é ' . tenant('id');
    });
});

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
