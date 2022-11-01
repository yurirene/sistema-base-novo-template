<?php

use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InconformidadeController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\OrigemController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TipoAcaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('nao-conformidade', InconformidadeController::class)->parameter('nao-conformidade', 'model')->names('inconformidades')->except(['destroy']); 

    Route::group(['prefix' => 'parametros'], function() {
        Route::resource('departamentos', DepartamentoController::class)->parameter('departamentos', 'model')->names('departamentos')->except(['destroy']);
        Route::get('/departamentos-delete/{model}', [DepartamentoController::class, 'delete'])->name('departamentos.delete');

        Route::resource('etapas', EtapaController::class)->parameter('etapas', 'model')->names('etapas')->except(['destroy']);
        Route::get('/etapas-delete/{model}', [EtapaController::class, 'delete'])->name('etapas.delete');

        Route::resource('niveis', NivelController::class)->parameter('niveis', 'model')->names('niveis')->except(['destroy']);
        Route::get('/niveis-delete/{model}', [NivelController::class, 'delete'])->name('niveis.delete');

        Route::resource('origens', OrigemController::class)->parameter('origens', 'model')->names('origens')->except(['destroy']);
        Route::get('/origens-delete/{model}', [OrigemController::class, 'delete'])->name('origens.delete');

        Route::resource('status', StatusController::class)->parameter('status', 'model')->names('status')->except(['destroy']);
        Route::get('/status-delete/{model}', [StatusController::class, 'delete'])->name('status.delete');

        Route::resource('tipo-acao', TipoAcaoController::class)->parameter('tipo-acao', 'model')->names('tipo-acao')->except(['destroy']);
        Route::get('/tipo-acao-delete/{model}', [TipoAcaoController::class, 'delete'])->name('tipo-acao.delete');

        Route::resource('usuarios', UsuarioController::class)->parameter('usuarios', 'model')->names('usuarios')->except(['destroy']);
        Route::get('/usuarios-delete/{model}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
    });
});