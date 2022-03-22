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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('dolars', 'livewire.dolars.index')->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Hooks - Do not delete//
	Route::view('adm/contablestudios', 'livewire.contablestudios.index')->middleware('auth');
	Route::view('adm/contables', 'livewire.contables.index')->middleware('auth');
	Route::view('adm/paymediosdetails', 'livewire.paymediosdetails.index')->middleware('auth');
	Route::view('adm/paymedios', 'livewire.paymedios.index')->middleware('auth');
	Route::view('adm/monetizadores', 'livewire.monetizadores.index')->middleware('auth');
	Route::view('adm/statstudios', 'livewire.statstudios.index')->middleware('auth');
	Route::view('adm/apicams', 'livewire.chaturdatas.index')->middleware('auth');
	Route::view('adm/chaturstatstudios', 'livewire.chaturstatstudios.index')->middleware('auth');
	Route::view('adm/prizesdetails', 'livewire.prizesdetails.index')->middleware('auth');
	Route::view('adm/prizes', 'livewire.prizes.index')->middleware('auth');
	Route::view('adm/monedas', 'livewire.monedas.index')->middleware('auth');
	Route::view('adm/paypages', 'livewire.paypages.index')->middleware('auth');
	Route::view('adm/pagemodels', 'livewire.pagemodels.index')->middleware('auth');
	Route::view('adm/conexions', 'livewire.conexions.index')->middleware('auth');
	Route::view('adm/pagemasters', 'livewire.pagemasters.index')->middleware('auth');
	Route::view('adm/empresas', 'livewire.empresas.index')->middleware('auth');

	Route::view('adm/estudios', 'livewire.estudios.index')->middleware('auth');
	Route::view('adm/modelos', 'livewire.modelos.index')->middleware('auth');

	Route::view('adm/pages', 'livewire.pages.index')->middleware('auth');
    Route::view('adm/dolars', 'livewire.dolars.index')->middleware('auth');