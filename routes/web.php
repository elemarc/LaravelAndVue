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

/*Route::view('/', function () {
    return view('welcome');
});*/
Route::view('/', 'home');//Das gleich, mit weniger syntaxis. Es geht gut, wenn man kein Datum schicken muss.
Route::view('about-us', 'about')->middleware('test')->name('about');

Route::get('contact-us', 'App\Http\Controllers\ContactFormController@create')->name('contact.create'); 
Route::post('contact-us', 'App\Http\Controllers\ContactFormController@store')->name('contact.store'); 

                                                                          
Route::get('customers', 'App\Http\Controllers\CustomersController@index')->name('customers.index');//me envia a customers y envia alli lo que de la funcion index en customerscontroller
Route::get('customers/create', 'App\Http\Controllers\CustomersController@create')->name('customers.create'); //me envia a customers/create y envia alli lo que de la funcion create en customerscontroller
Route::post('customers','App\Http\Controllers\CustomersController@store')->name('customers.store'); //me envia a customers y envia alli lo que de la funcion store en customerscontroller
Route::get('customers/{customer}','App\Http\Controllers\CustomersController@show')->name('customers.show'); //me envia a customers/usuario y envia alli lo que de la funcion show en customerscontroller
Route::get('customers/{customer}/edit','App\Http\Controllers\CustomersController@edit')->name('customers.edit'); //me envia a customers/usuario/edit y envia alli lo que de la funcion edit en customerscontroller
Route::patch('customers/{customer}', 'App\Http\Controllers\CustomersController@update')->name('customers.update'); //me envia a customers/usuario y envia alli lo que de la funcion update en customerscontroller
Route::delete('customers/{customer}', 'App\Http\Controllers\CustomersController@destroy')->name('customers.destroy'); //me envia a customers/usuario y envia alli lo que de la funcion destroy en customerscontroller

//este hace que todas las anteriores se apliquen dinamicamente 
//siempre que haya seguido las convenciones
Route::Resource('customers', 'App\Http\Controllers\CustomersController')->middleware('auth')/*->except(['index'])*/; //bloquea si no estoy autenticado; el except permite que acceda a la lista pero no pueda acceder a editar ni crear ni nada

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
