<?php

namespace App\Http\Services\Trofeu;

use App\Models\Trofeu\Trofeu;

class TrofeuService
{

  public function buscar($request)
  {
    $trofeus = Trofeu::query();

    if ($request->filled('nome')) {
      $trofeus->where('nome', 'like', '%' . $request->nome . '%');
    }

    if ($request->filled('campus')) {
      $trofeus->where('campus_id', $request->campus);
    }

    if ($request->filled('ano')) {
      $trofeus->where('ano', $request->ano);
    }

    if ($request->filled('modalidade')) {
      $trofeus->where('modalidade_id', $request->modalidade);
    }

    if ($request->filled('colocacao')) {
      $trofeus->where('colocacao', $request->colocacao);
    }

    return $trofeus->paginate();
  }

  public function salvar($request)
  {

    $trofeus = new Trofeu();
    $trofeus->fill($request->all());
    $trofeus->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O Troféu foi adicionado com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }

  public function atualizar($request)
  {

    $trofeus = Trofeu::find($request->id);
    $trofeus->fill($request->all());
    $trofeus->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O Troféu foi atualizado com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }

  public function deletar($request)
  {
    (new Trofeu())->find($request->id)->delete();
    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O Troféu foi excluido com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }
}
