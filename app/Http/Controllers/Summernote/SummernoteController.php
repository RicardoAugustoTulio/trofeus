<?php

namespace App\Http\Controllers\Summernote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SummernoteController extends Controller
{

  public function upload(Request $request)
  {
    if ($request->hasFile('upload')) {
      $imageName = time() . '.' . $request->file('upload')->extension();
      $request->file('upload')->move(public_path('images'), $imageName);
      $path = 'images/' . $imageName;
      $url_imagem = $path;
    }

    return response()->json(['fileName' => $imageName, 'uploaded' => 1, 'url' => asset($url_imagem)]);
  }

  public function deletarImagem(Request $request)
  {
    $imageUrl = $request->caminho;

    $imagePath = parse_url($imageUrl, PHP_URL_PATH);

    $imagePath = public_path($imagePath);

    if (File::exists($imagePath)) {
      File::delete($imagePath);
    }
  }

}
