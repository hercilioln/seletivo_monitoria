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

Route::middleware(['auth'])->group(function () {
    Route::get('/cartorio', [App\Http\Controllers\ConfiguracaoCartorioController::class, 'index'])->name('cartorio.index');
    Route::get('/cartorio/create', [App\Http\Controllers\ConfiguracaoCartorioController::class, 'create'])->name('cartorio.create');
    Route::post('/cartorio/store', [App\Http\Controllers\ConfiguracaoCartorioController::class, 'store'])->name('cartorio.store');
    Route::get('/cartorio/edit/{id}', [App\Http\Controllers\ConfiguracaoCartorioController::class, 'edit'])->name('cartorio.edit');
    Route::put('/cartorio/update/{id}', [App\Http\Controllers\ConfiguracaoCartorioController::class, 'update'])->name('cartorio.update');
    Route::delete('/cartorio/destroy/{id}', [App\Http\Controllers\ConfiguracaoCartorioController::class, 'destroy'])->name('cartorio.destroy');

    Route::get('/escrevente', [App\Http\Controllers\EscreventeController::class, 'index'])->name('escrevente.index');
    Route::get('/escrevente/create', [App\Http\Controllers\EscreventeController::class, 'create'])->name('escrevente.create');
    Route::post('/escrevente/store', [App\Http\Controllers\EscreventeController::class, 'store'])->name('escrevente.store');
    Route::get('/escrevente/edit/{id}', [App\Http\Controllers\EscreventeController::class, 'edit'])->name('escrevente.edit');
    Route::put('/escrevente/update/{id}', [App\Http\Controllers\EscreventeController::class, 'update'])->name('escrevente.update');
    Route::delete('/escrevente/destroy/{id}', [App\Http\Controllers\EscreventeController::class, 'destroy'])->name('escrevente.destroy');

    Route::get('/certidao2', [App\Http\Controllers\Certidao2Controller::class, 'index'])->name('certidao2.index');
    Route::get('/certidao2/create', [App\Http\Controllers\Certidao2Controller::class, 'create'])->name('certidao2.create');
    Route::post('/certidao2/store', [App\Http\Controllers\Certidao2Controller::class, 'store'])->name('certidao2.store');
    Route::get('/certidao2/{id}', [App\Http\Controllers\Certidao2Controller::class, 'show'])->name('certidao2.show');
    Route::get('/certidao2/edit/{id}', [App\Http\Controllers\Certidao2Controller::class, 'edit'])->name('certidao2.edit');
    Route::put('/certidao2/update/{id}', [App\Http\Controllers\Certidao2Controller::class, 'update'])->name('certidao2.update');
    Route::delete('/certidao2/destroy/{id}', [App\Http\Controllers\Certidao2Controller::class, 'destroy'])->name('certidao2.destroy');



});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
