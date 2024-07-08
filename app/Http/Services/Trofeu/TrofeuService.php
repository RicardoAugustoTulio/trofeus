<?php

namespace App\Http\Services\Trofeu;

use App\Models\Trofeu\Trofeu;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
    $trofeu = new Trofeu();
    $trofeu->fill($request->all());

    if ($request->hasFile('formFile')) {
      $imageName = time() . '.' . $request->file('formFile')->extension();
      $request->file('formFile')->move(public_path('images'), $imageName);
      $path = 'images/' . $imageName;
      $trofeu->url_imagem = $path;
    }

    $trofeu->save();

    return redirect()->back()->with('success', 'O Troféu foi adicionado com sucesso!');
  }

  public function atualizar($request)
  {

    $trofeu = Trofeu::find($request->id);
    $trofeu->fill($request->all());

    if ($request->hasFile('formFile')) {
      $imageName = time() . '.' . $request->file('formFile')->extension();
      $request->file('formFile')->move(public_path('images'), $imageName);
      $path = 'images/' . $imageName;
      $trofeu->url_imagem = $path;
    }


    $trofeu->save();

    return redirect()->back()->with('success', 'O Troféu foi atualizado com sucesso!');
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

  public function deletarImagem($request)
  {
    $trofeu = Trofeu::find($request->id);

    if (File::exists($trofeu->url_imagem)) {
      File::delete($trofeu->url_imagem);
    }

    $trofeu->url_imagem = null;
    $trofeu->save();

    return response(
      [
        'title' => 'Sucesso!', 'text' => 'A imagem foi excluida com sucesso!', 'icon' => 'success', 'confirmButtonText' => 'OK!', 'reload' => 1
      ],
      200
    );

  }
}
