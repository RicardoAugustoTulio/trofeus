<?php

namespace App\Http\Controllers\StatusTrofeu;

use App\Http\Controllers\Controller;
use App\Http\Services\StatusTrofeu\StatusTrofeuService;
use App\Models\StatusTrofeu\StatusTrofeu;
use Illuminate\Http\Request;

class StatusTrofeuController extends Controller
{
  private $service;

  private array $regras = [
    'nome' => 'required|max:255',
  ];

  private array $mensagens = [
    'required' => 'O campo :attribute é obrigatório',
    'max' => 'O campo :attribute tem o limite máximo de :max caractéres.'
  ];

  public function __construct()
  {
    $this->service = new StatusTrofeuService();
  }

  public function index(Request $request)
  {
    $status = $this->service->buscar($request);

    return view('status_trofeu.index')
      ->with('status', $status);
  }

  public function novo()
  {
    return view('status_trofeu.add');
  }

  public function salvar(Request $request)
  {
    $request->validate($this->regras, $this->mensagens);
    try {
      return $this->service->salvar($request);
    } catch (\Exception $e) {
      return response(
        [
          'title' => 'Erro!', 'text' => 'Algo deu errado ao salvar as informações!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ], 500);
    }
  }

  public function editar($status)
  {
    $status = StatusTrofeu::findOrFail($status);
    return view('status_trofeu.edit')
      ->with('status', $status);
  }

  public function atualizar(Request $request)
  {
    $request->validate($this->regras, $this->mensagens);
    try {
      return $this->service->atualizar($request);
    } catch (\Exception $e) {
      return response(
        [
          'title' => 'Erro!', 'text' => 'Algo deu errado ao atualizar as informações!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ], 500);
    }
  }

  public function deletar(Request $request)
  {
    try {
      return $this->service->deletar($request);
    } catch (\Exception $e) {
      return response(
        [
          'title' => 'Erro!', 'text' => 'Algo deu errado ao deletar o status!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ], 500);
    }
  }
}
