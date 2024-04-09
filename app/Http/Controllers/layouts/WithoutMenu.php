<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WithoutMenu extends Controller
{
  public function index()
  {

    return view('content.layouts-example.layouts-without-menu');
  }

  public function enviarTrofeu(Request $request)
  {
    try {
//      $user = new User();
//      $user->fill($request->all());
//      $user->save();
//      Throw new \Exception();
      return response(
        [
          'title' => 'Sucesso!', 'text' => 'parabens deu certo', 'icon' => 'success', 'confirmButtonText' => 'ok!'
        ],200);
    }catch(\Exception $e){
      return response(
        [
          'title' => 'Erro!', 'text' => 'Algo deu errado ao enviar o trofeu!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
        ],500);
    }
  }
}
