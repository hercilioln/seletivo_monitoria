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

Route::get('/', [App\Http\Controllers\EditalController::class, 'index'])->name('inicial');
Route::get('/editalview/{id}', [App\Http\Controllers\EditalController::class, 'show'])->name('edital.show');

Auth::routes();

Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/cursos', [App\Http\Controllers\CursoController::class, 'index'])->name('cursos.index');
    Route::get('/cursos/create', [App\Http\Controllers\CursoController::class, 'create'])->name('cursos.create');
    Route::post('/cursos/store', [App\Http\Controllers\CursoController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/edit/{id}', [App\Http\Controllers\CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/update/{id}', [App\Http\Controllers\CursoController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/destroy/{id}', [App\Http\Controllers\CursoController::class, 'destroy'])->name('cursos.destroy');

    Route::get('/disciplinas', [App\Http\Controllers\DisciplinaController::class, 'index'])->name('disciplinas.index');
    Route::get('/disciplinas/create', [App\Http\Controllers\DisciplinaController::class, 'create'])->name('disciplinas.create');
    Route::post('/disciplinas/store', [App\Http\Controllers\DisciplinaController::class, 'store'])->name('disciplinas.store');
    Route::get('/disciplinas/edit/{id}', [App\Http\Controllers\DisciplinaController::class, 'edit'])->name('disciplinas.edit');
    Route::put('/disciplinas/update/{id}', [App\Http\Controllers\DisciplinaController::class, 'update'])->name('disciplinas.update');
    Route::delete('/disciplinas/destroy/{id}', [App\Http\Controllers\DisciplinaController::class, 'destroy'])->name('disciplinas.destroy');

    Route::get('/eventos', [App\Http\Controllers\EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/create', [App\Http\Controllers\EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos/store', [App\Http\Controllers\EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{id}', [App\Http\Controllers\EventoController::class, 'show'])->name('eventos.show');
    Route::get('/eventos/edit/{id}', [App\Http\Controllers\EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/update/{id}', [App\Http\Controllers\EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/destroy/{id}', [App\Http\Controllers\EventoController::class, 'destroy'])->name('eventos.destroy');
    
    Route::get('/vagas', [App\Http\Controllers\VagaController::class, 'index'])->name('vagas.index');
    Route::get('/vagas/create/{eventoId}', [App\Http\Controllers\VagaController::class, 'create'])->name('vagas.create');
    Route::post('/vagas/create/{eventoId}', [App\Http\Controllers\VagaController::class, 'store'])->name('vagas.store');
    Route::get('/vagas/{id}', [App\Http\Controllers\VagaController::class, 'show'])->name('vagas.show');
    Route::get('/vagas/edit/{id}', [App\Http\Controllers\VagaController::class, 'edit'])->name('vagas.edit');
    Route::put('/vagas/update/{id}', [App\Http\Controllers\VagaController::class, 'update'])->name('vagas.update');
    Route::delete('/vagas/destroy/{id}', [App\Http\Controllers\VagaController::class, 'destroy'])->name('vagas.destroy');

});

Route::middleware(['checkRole:aluno'])->group(function () {
    Route::get('incricoes', [App\Http\Controllers\MinhasInscricoesController::class, 'index'])->name('alunos.incricoes');
    Route::get('/alunos', [App\Http\Controllers\AlunoController::class, 'index'])->name('alunos.index');

    Route::post('/inscricao/store', [App\Http\Controllers\InscricaoController::class, 'store'])->name('inscricao.store');

});


Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/alunos/create', [App\Http\Controllers\AlunoController::class, 'create'])->name('alunos.create');
Route::post('/alunos/store', [App\Http\Controllers\AlunoController::class, 'store'])->name('alunos.store');


//Route::get('/editais', [App\Http\Controllers\EditalController::class, 'index'])->name('editais');

