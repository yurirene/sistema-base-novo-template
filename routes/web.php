<?php

use App\Http\Controllers\AnaliseCausaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InconformidadeController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\OrigemController;
use App\Http\Controllers\PlanoAcaoController;
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
    Route::get('/nao-conformidade-delete/{model}', [InconformidadeController::class, 'delete'])->name('inconformidades.delete');

    Route::resource('analise-causa', AnaliseCausaController::class)->parameter('analise-causa', 'model')->names('analise-causa')->only(['store', 'update']); 

    Route::resource('plano-acao', PlanoAcaoController::class)->parameter('plano-acao', 'model')->names('plano-acao')->only(['store', 'update']); 

    Route::group(['prefix' => 'parametros'], function() {
        Route::resource('departamentos', DepartamentoController::class)->parameter('departamentos', 'model')->names('departamentos')->except(['destroy']);
        Route::get('/departamentos-delete/{model}', [DepartamentoController::class, 'delete'])->name('departamentos.delete');

        Route::resource('niveis', NivelController::class)->parameter('niveis', 'model')->names('niveis')->except(['destroy']);
        Route::get('/niveis-delete/{model}', [NivelController::class, 'delete'])->name('niveis.delete');

        Route::resource('origens', OrigemController::class)->parameter('origens', 'model')->names('origens')->except(['destroy']);
        Route::get('/origens-delete/{model}', [OrigemController::class, 'delete'])->name('origens.delete');

        Route::resource('tipo-acao', TipoAcaoController::class)->parameter('tipo-acao', 'model')->names('tipo-acao')->except(['destroy']);
        Route::get('/tipo-acao-delete/{model}', [TipoAcaoController::class, 'delete'])->name('tipo-acao.delete');

        Route::resource('usuarios', UsuarioController::class)->parameter('usuarios', 'model')->names('usuarios')->except(['destroy']);
        Route::get('/usuarios-delete/{model}', [UsuarioController::class, 'delete'])->name('usuarios.delete');
    });
});