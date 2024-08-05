<?php

namespace App\Http\Services\Perfil;

use App\Models\User;

class PerfilService
{

  public function salvar($request)
  {
    $user = auth()->user();
    $user->fill($request->all());
    $user->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'As informações foram salvas com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ], 200);
  }

}
