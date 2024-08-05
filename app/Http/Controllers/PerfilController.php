<?php

namespace App\Http\Controllers;

use App\Http\Services\Perfil\PerfilService;
use Illuminate\Http\Request;

class PerfilController extends Controller
{

  private $service;

  public function __construct()
  {
    $this->service = new PerfilService();
  }


  public function index()
  {
    return view('perfil.index')
      ->with('user',auth()->user());
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

}
