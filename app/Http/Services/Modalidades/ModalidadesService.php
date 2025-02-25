<?php

namespace App\Http\Services\Modalidades;

use App\Models\Modalidades\Modalidades;

class ModalidadesService
{
  public function buscar($request)
  {

    $modalidades = Modalidades::query();

    if ($request->nome) {
      $modalidades = $modalidades->where('nome', 'like', '%' . $request->nome . '%');
    }

    if ($request->descricao) {
      $modalidades = $modalidades->where('descricao', 'like', '%' . $request->descricao . '%');
    }

    $modalidades = $modalidades->paginate(15);
    return $modalidades;
  }

  public function salvar($request)
  {

    $modalidades = new Modalidades();
    $modalidades->fill($request->all());

    if (Modalidades::where('nome', 'like', $request->nome)->first()) {
      return response([
        'title' => 'Erro!', 'text' => 'Já existe uma modalidade com esse nome!', 'icon' => 'error', 'confirmButtonText' => 'ok!'
      ], 500);
    }

    $modalidades->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'A modalidade foi adicionada com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }

  public function atualizar($request)
  {
    $modalidades = Modalidades::find($request->id);
    $modalidades->fill($request->all());
    $modalidades->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'A modalidade foi atualizada com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }

  public function deletar($request)
  {

    $modalidade = Modalidades::find($request->id);

    if ($modalidade->trofeus) {
      return response(
        [
          'title' => 'Vínculos Ativos!', 'text' => 'Existem troféus cadastrados com essa modalidade! Vincule esses troféus a outra modalidade para poder excluir essa.', 'icon' => 'warning', 'confirmButtonText' => 'OK!', 'reload' => 1
        ],
        500
      );
    }

    Modalidades::find($request->id)->delete();
    return response(
      [
        'title' => 'Sucesso!', 'text' => 'A modalidade foi removida com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );
  }
}
