<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DisciplinaController;
use App\Http\Controllers\Admin\FotoController;
use App\Http\Controllers\Admin\ProfessorController;

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

// Route::redirect('/', '/admin/disciplinas');
// site principal

Route::prefix('admin')->group(function () {

    // Route::get('disciplinas', [DisciplinasController::class, 'disciplinas'])->name('listaDisciplinas');
    // Route::get('disciplinas/adicionar', [DisciplinasController::class, 'formAdicionar'])->name('formDisciplina');
    // Route::post('disciplinas/adicionar', [DisciplinasController::class, 'adicionar'])->name('formAdicionar');
    // Route::delete('disciplinas/{id}', [DisciplinasController::class, 'remover'])->name('formRemover');
    // Route::get('disciplinas/{id}', [DisciplinasController::class, 'formEditar'])->name('formEditar');
    // Route::put('disciplinas/{id}', [DisciplinasController::class, 'editar'])->name('editar');

    Route::resource('disciplinas', DisciplinaController::class);
    Route::resource('professor', ProfessorController::class)->except(['show']);

    Route::resource('professor.fotos', FotoController::class)->except(['show', 'edit', 'update']);

    // site principal


});

Route::resource('/', \App\Http\Controllers\Site\ProfessorController::class)->only('index');

Route::resource('professores.disciplinas', App\Http\Controllers\Site\DisciplinaController::class)->only(['index', 'show']);
