<?php

namespace App\Http\Services;

class TrofeuService
{

  public function buscar($request)
  {
    return view('trofeus.index');
  }
}
