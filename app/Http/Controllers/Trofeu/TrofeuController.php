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

  public function __construct()
  {
    $this->service = new TrofeuService();
  }

  public function index(Request $request)
  {
//      $imageName = time() . '.' . $request->file->extension();
//      $request->file->move(public_path('images'), $imageName);
//      // Atualiza o caminho da imagem no banco de dados
//      $path = 'images/' . $imageName;
//      dd($path);
//      //so pra salvar como salvar imagem
////     acesso: <img src="{{ asset('images/1713068679.jpg') }}" alt="Imagem do troféu">
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
          'title' => 'Erro!', 'text' => 'Algo deu errado ao atualizar as informações!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ], 500);
    }
  }

}
