<?php

namespace App\Http\Controllers\Trofeu;

use App\Http\Controllers\Controller;
use App\Http\Services\Trofeu\TrofeuService;
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
    try {
//      $imageName = time() . '.' . $request->file->extension();
//      $request->file->move(public_path('images'), $imageName);
//      // Atualiza o caminho da imagem no banco de dados
//      $path = 'images/' . $imageName;
//      dd($path);
//      //so pra salvar como salvar imagem
////     acesso: <img src="{{ asset('images/1713068679.jpg') }}" alt="Imagem do troféu">
      return $this->service->buscar($request);
    } catch (\Exception $e) {

    }
  }

  public function detalhes($trofeu)
  {
   $trofeu = Trofeu::with('campus', 'status')->findOrFail($trofeu);

    return view('pagina_trofeu.index')
      ->with('trofeu', $trofeu);
  }

}
