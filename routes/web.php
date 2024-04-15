<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Campus\CampusController;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatusTrofeu\StatusTrofeuController;
use App\Http\Controllers\Trofeu\TrofeuController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Main Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

  //trofeus
  Route::get('trofeus/listagem', [TrofeuController::class, 'index'])->name('trofeus');
  Route::get('exemplo', [TrofeuController::class, 'exemplo'])->name('exemplo');
  Route::post('exemplo-salvar', [TrofeuController::class, 'salvarExemplo'])->name('salvar-exemplo');

  //campus
  Route::get('campus/listagem', [CampusController::class, 'index'])->name('campus-listagem');
  Route::get('campus/novo', [CampusController::class, 'novo'])->name('campus-novo');
  Route::post('campus/salvar', [CampusController::class, 'salvar'])->name('campus-salvar');
  Route::get('campus/editar/{campus}', [CampusController::class, 'editar'])->name('campus-editar');
  Route::put('campus/atualizar', [CampusController::class, 'atualizar'])->name('campus-atualizar');
  Route::delete('campus/deletar', [CampusController::class, 'deletar'])->name('campus-deletar');

  //statusTrofeu
  Route::get('status/listagem', [StatusTrofeuController::class, 'index'])->name('status-listagem');
  Route::get('status/novo', [StatusTrofeuController::class, 'novo'])->name('status-novo');
  Route::post('status/salvar', [StatusTrofeuController::class, 'salvar'])->name('status-salvar');
  Route::get('status/editar/{status}', [StatusTrofeuController::class, 'editar'])->name('status-editar');
  Route::put('status/atualizar', [StatusTrofeuController::class, 'atualizar'])->name('status-atualizar');
  Route::delete('status/deletar', [StatusTrofeuController::class, 'deletar'])->name('status-deletar');
});

