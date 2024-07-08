<?php

namespace App\Http\Controllers\Trofeu;

use App\Http\Controllers\Controller;
use App\Http\Controllers\StatusTrofeu\StatusTrofeuController;
use App\Http\Services\Trofeu\TrofeuService;
use App\Models\Campus\Campus;
use App\Models\Modalidades\Modalidades;
use App\Models\StatusTrofeu\StatusTrofeu;
use App\Models\Trofeu\Trofeu;
use Illuminate\Http\Request;

class TrofeuController extends Controller
{

  private $service;

  private array $regras = [
    'nome' => 'required|max:255',
    'ano' => 'required|max:4',
    'colocacao' => 'required|max:2',
    'campus_id' => 'required',
    'modalidade_id' => 'required',
    'status_id' => 'required',
  ];
  private array $mensagens = [
    'required' => 'O campo :attribute é obrigatório',
    'max' => 'O campo :attribute tem o limite máximo de :max caractéres.'
  ];

  public function __construct()
  {
    $this->service = new TrofeuService();
  }

  public function index(Request $request)
  {
    $trofeus = $this->service->buscar($request);
    $modalidades = Modalidades::all();
    $campus = Campus::all();


    return view('trofeus.index')
      ->with('trofeus', $trofeus)
      ->with('modalidades', $modalidades)
      ->with('campus', $campus);

  }

  public function detalhes($trofeu)
  {
    $trofeu = Trofeu::with('campus', 'status')->findOrFail($trofeu);

    return view('pagina_trofeu.index')
      ->with('trofeu', $trofeu);
  }

  public function novo()
  {
    $modalidades = Modalidades::all();
    $campus = Campus::all();
    $status = StatusTrofeu::all();

    return view('trofeus.add')
      ->with('modalidades', $modalidades)
      ->with('campus', $campus)
      ->with('statusTrofeu', $status);
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

  public function editar(Trofeu $trofeu)
  {
    $modalidades = Modalidades::all();
    $campus = Campus::all();
    $status = StatusTrofeu::all();

    return view('trofeus.edit')
      ->with('trofeu', $trofeu)
      ->with('modalidades', $modalidades)
      ->with('campus', $campus)
      ->with('statusTrofeu', $status);
  }

  public function atualizar(Request $request)
  {
    $request->validate($this->regras, $this->mensagens);

    try {
      return $this->service->atualizar($request);
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Algo deu errado ao atualizar o troféu');
    }
  }

  public function deletar(Request $request)
  {
    try {
      return $this->service->deletar($request);
    } catch (\Exception $e) {
      return response(
        [
          'title' => 'Erro!', 'text' => 'Algo deu errado ao deletar o troféu!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ], 500);
    }
  }

  public function deletarImagem(Request $request)
  {
    try {
      return $this->service->deletarImagem($request);
    } catch (\Exception $e) {
      return response(
        [
          'title' => 'Erro!', 'text' => 'Algo deu errado ao deletar a imagem!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ], 500);
    }
  }

}
