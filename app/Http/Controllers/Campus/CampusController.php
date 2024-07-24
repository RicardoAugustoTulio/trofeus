<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use App\Http\Services\Campus\CampusService;
use App\Models\Campus\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
  private $service;

  private array $regras = [
    'nome' => 'required|max:150',
    'sigla' => 'required|max:4',
  ];
  private array $mensagens = [
    'required' => 'O campo :attribute é obrigatório',
    'max' => 'O campo :attribute tem o limite máximo de :max caractéres.'
  ];

  public function __construct()
  {
    $this->service = new CampusService();
  }

  public function index(Request $request)
  {
    $campus = $this->service->buscar($request);

    return view('campus.index')
      ->with('campus', $campus);
  }

  public function novo()
  {
    return view('campus.add');
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

  public function editar($campus)
  {
    $campus = Campus::findOrFail($campus);

    return view('campus.edit')
      ->with('campus', $campus);
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
          'title' => 'Erro!', 'text' => 'Algo deu errado ao deletar o campus!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ], 500);
    }
  }
}
