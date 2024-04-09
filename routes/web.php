<?php

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
  Route::get('trofeus/listagem', [\App\Http\Controllers\Trofeu\TrofeuController::class, 'index'])->name('trofeus');
  Route::get('exemplo', [\App\Http\Controllers\Trofeu\TrofeuController::class, 'exemplo'])->name('exemplo');
  Route::post('exemplo-salvar', [\App\Http\Controllers\Trofeu\TrofeuController::class, 'salvarExemplo'])->name('salvar-exemplo');

});

