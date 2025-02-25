<?php

namespace App\Http\Services\Campus;

use App\Models\Campus\Campus;

class CampusService
{
  public function buscar($request)
  {

    $campus = Campus::query();

    if ($request->nome) {
      $campus = $campus->where('nome', 'like', '%' . $request->nome . '%');
    }

    if ($request->sigla) {
      $campus = $campus->where('sigla', 'like', '%' . $request->sigla . '%');
    }

    $campus = $campus->paginate(15);
    return $campus;
  }

  public function salvar($request)
  {

    $campus = new Campus();
    $campus->fill($request->all());
    $campus->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O campus foi adicionado com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }

  public function atualizar($request)
  {
    $campus = Campus::find($request->id);
    $campus->fill($request->all());
    $campus->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O campus foi atualizado com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }

  public function deletar($request)
  {
    $campus = Campus::find($request->id);

    if ($campus->trofeus) {
      return response(
        [
          'title' => 'Vínculos Ativos!', 'text' => 'Existem troféus cadastrados com esse campus! Vincule esses troféus a outro campus para poder excluir esse.', 'icon' => 'warning', 'confirmButtonText' => 'OK!', 'reload' => 1
        ],
        500
      );
    }

    $campus->delete();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O campus foi removido com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }
}
