<?php

namespace App\Http\Services\StatusTrofeu;

use App\Models\StatusTrofeu\StatusTrofeu;

class StatusTrofeuService
{
  public function buscar($request)
  {

    $status = StatusTrofeu::query();

    if ($request->nome) {
      $status = $status->where('nome', 'like', '%' . $request->nome . '%');
    }

    $status = $status->paginate(15);
    return $status;
  }

  public function salvar($request)
  {

    $status = new StatusTrofeu();
    $status->fill($request->all());
    $status->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O status foi adicionado com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ], 200);
  }

  public function atualizar($request)
  {
    $status = StatusTrofeu::find($request->id);
    $status->fill($request->all());
    $status->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O status foi atualizado com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ], 200);
  }

  public function deletar($request)
  {
    StatusTrofeu::find($request->id)->delete();
    return response(
      [
        'title' => 'Sucesso!', 'text' => 'O status foi removido com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ], 200);
  }
}
