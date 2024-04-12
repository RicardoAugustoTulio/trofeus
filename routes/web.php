<?php

use App\Http\Controllers\Campus\CampusController;
use App\Http\Controllers\Trofeu\TrofeuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Main Page Route
Route::get('/', [Analytics::class, 'index'])->name('home');


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
});

