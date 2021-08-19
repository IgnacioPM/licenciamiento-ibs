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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('cedula', 'livewire.cedulas.index')->middleware('auth');
	Route::view('cedula', 'livewire.cedulas.index')->middleware('auth');
	Route::view('cedula', 'livewire.cedulas.index')->middleware('auth');
	Route::view('solicitud', 'livewire.solicituds.index')->middleware('auth');
	Route::view('contrato', 'livewire.contratos.index')->middleware('auth');
	Route::view('comercio', 'livewire.comercios.index')->middleware('auth');
	Route::view('cliente', 'livewire.clientes.index')->middleware('auth');
	Route::view('cedula', 'livewire.cedulas.index')->middleware('auth');
	Route::view('capacitacion', 'livewire.capacitacions.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
