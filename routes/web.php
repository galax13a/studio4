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
	Route::view('trafic1s', 'livewire.trafic1s.index')->middleware('auth');
	Route::view('trafic1', 'livewire.trafic1.index')->middleware('auth');
	Route::view('botrooms', 'livewire.botrooms.index')->middleware('auth');
	Route::view('monedas', 'livewire.monedas.index')->middleware('auth');
	Route::view('paystudios', 'livewire.paystudios.index')->middleware('auth');
	Route::view('adm/invoicepaystudios', 'livewire.invoicepaystudios.index')->middleware('auth')->name('invoicepaystudios');
	Route::view('adm/contable-studios', 'livewire.contablestudios.index')->middleware('auth')->name('contablestudios');
	Route::view('adm/contables', 'livewire.contables.index')->middleware('auth')->name('contables');
	Route::view('adm/paymedios-details-models', 'livewire.paymediosdetails.index')->middleware('auth')->name('paymediosdetails');
	Route::view('adm/pay-medios', 'livewire.paymedios.index')->middleware('auth')->name('paymedios');
	Route::view('adm/money-local', 'livewire.monetizadores.index')->middleware('auth')->name('money-local');
	Route::view('adm/pay-page-studio', 'livewire.paystudios.index')->middleware('auth')->name('pay-page-studio');
	Route::view('adm/api-chaturbate', 'livewire.chaturdatas.index')->middleware('auth')->name('apichatur');
	Route::view('adm/chaturbate-stats-tudios', 'livewire.chaturstatstudios.index')->middleware('auth')->name('chaturstatstudios');
	Route::view('adm/prizes-details-models', 'livewire.prizesdetails.index')->middleware('auth')->name('prizesdetails');
	Route::view('adm/prizes-models', 'livewire.prizes.index')->middleware('auth')->name('prizes');
	Route::view('adm/currency', 'livewire.monedas.index')->middleware('auth')->name('monedas');
	Route::view('adm/pay-pages-models', 'livewire.paypages.index')->middleware('auth')->name('pay-pages-models');
	Route::view('adm/pages-models', 'livewire.pagemodels.index')->middleware('auth')->name('pagemodels');
	Route::view('adm/models-conexions', 'livewire.conexions.index')->middleware('auth')->name('cnxmodels');
	Route::view('adm/masters', 'livewire.pagemasters.index')->middleware('auth')->name('master');
	Route::view('adm/business', 'livewire.empresas.index')->middleware('auth')->name('business');
	Route::view('adm/studios', 'livewire.estudios.index')->middleware('auth')->name('estudios');
	Route::view('adm/studio-models', 'livewire.modelos.index')->middleware('auth')->name('modelos');
	Route::view('adm/cams-pages', 'livewire.pages.index')->middleware('auth')->name('pages-cams');
    Route::view('adm/dolars-colombia', 'livewire.dolars.index')->middleware('auth')->name('dolars');
	Route::get('test', 'App\Http\Controllers\TestController@index');