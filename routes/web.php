<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Campus\CampusController;
use App\Http\Controllers\Gemini\GeminiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Modalidades\ModalidadesController;
use App\Http\Controllers\StatusTrofeu\StatusTrofeuController;
use App\Http\Controllers\Trofeu\TrofeuController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Main Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('trofeu/{trofeu}/{slug?}', [TrofeuController::class, 'detalhes'])->name('trofeu-detalhe');


Route::middleware('auth')->group(function () {
  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

  //Gemini Text
  Route::any('gemini/text', [GeminiController::class, 'index'])->name('gemini-text');

  //trofeus
  Route::get('trofeus/listagem', [TrofeuController::class, 'index'])->name('trofeus-listagem');
  Route::get('trofeus/novo', [TrofeuController::class, 'novo'])->name('trofeus-novo');
  Route::post('trofeus/salvar', [TrofeuController::class, 'salvar'])->name('trofeus-salvar');
  Route::get('trofeus/editar/{trofeu}', [TrofeuController::class, 'editar'])->name('trofeus-editar');
  Route::put('trofeus/atualizar', [TrofeuController::class, 'atualizar'])->name('trofeus-atualizar');
  Route::delete('trofeus/deletar', [TrofeuController::class, 'deletar'])->name('trofeus-deletar');
  Route::delete('trofeus/deletar-imagem', [TrofeuController::class, 'deletarImagem'])->name('trofeus-deletar-imagem');
  //campus
  Route::get('campus/listagem', [CampusController::class, 'index'])->name('campus-listagem');
  Route::get('campus/novo', [CampusController::class, 'novo'])->name('campus-novo');
  Route::post('campus/salvar', [CampusController::class, 'salvar'])->name('campus-salvar');
  Route::get('campus/editar/{campus}', [CampusController::class, 'editar'])->name('campus-editar');
  Route::put('campus/atualizar', [CampusController::class, 'atualizar'])->name('campus-atualizar');
  Route::delete('campus/deletar', [CampusController::class, 'deletar'])->name('campus-deletar');

  //modalidades
  Route::get('modalidades/listagem', [ModalidadesController::class, 'index'])->name('modalidades-listagem');
  Route::get('modalidades/novo', [ModalidadesController::class, 'novo'])->name('modalidades-novo');
  Route::post('modalidades/salvar', [ModalidadesController::class, 'salvar'])->name('modalidades-salvar');
  Route::get('modalidades/editar/{modalidade}', [ModalidadesController::class, 'editar'])->name('modalidades-editar');
  Route::put('modalidades/atualizar', [ModalidadesController::class, 'atualizar'])->name('modalidades-atualizar');
  Route::delete('modalidades/deletar', [ModalidadesController::class, 'deletar'])->name('modalidades-deletar');

  //statusTrofeu
  Route::get('status/listagem', [StatusTrofeuController::class, 'index'])->name('status-listagem');
  Route::get('status/novo', [StatusTrofeuController::class, 'novo'])->name('status-novo');
  Route::post('status/salvar', [StatusTrofeuController::class, 'salvar'])->name('status-salvar');
  Route::get('status/editar/{status}', [StatusTrofeuController::class, 'editar'])->name('status-editar');
  Route::put('status/atualizar', [StatusTrofeuController::class, 'atualizar'])->name('status-atualizar');
  Route::delete('status/deletar', [StatusTrofeuController::class, 'deletar'])->name('status-deletar');
});
