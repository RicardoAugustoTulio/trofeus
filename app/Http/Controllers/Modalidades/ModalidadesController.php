<?php

namespace App\Http\Controllers\Modalidades;

use App\Http\Controllers\Controller;
use App\Http\Services\Modalidades\ModalidadesService;
use App\Models\Modalidades\Modalidades;
use Illuminate\Http\Request;

class ModalidadesController extends Controller
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
    $this->service = new ModalidadesService();
  }

  public function index(Request $request)
  {
    $modalidades = $this->service->buscar($request);

    return view('modalidades.index')
      ->with('modalidades', $modalidades);
  }

  public function novo()
  {
    return view('modalidades.add');
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
        ],
        500
      );
    }
  }

  public function editar($modalidades)
  {
    $modalidades = Modalidades::findOrFail($modalidades);

    return view('modalidades.edit')
      ->with('modalidade', $modalidades);
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
        ],
        500
      );
    }
  }

  public function deletar(Request $request)
  {
    try {
      return $this->service->deletar($request);
    } catch (\Exception $e) {
      return response(
        [
          'title' => 'Erro!', 'text' => 'Algo deu errado ao deletar a modalidade!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ],
        500
      );
    }
  }
}
