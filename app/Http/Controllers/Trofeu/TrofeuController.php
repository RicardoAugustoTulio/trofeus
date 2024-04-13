<?php

namespace App\Http\Controllers\Trofeu;

use App\Http\Controllers\Controller;
use App\Http\Services\Trofeu\TrofeuService;
use Illuminate\Http\Request;

class TrofeuController extends Controller
{

  private $service;

  public function __construct()
  {
    $this->service = new TrofeuService();
  }

  public function index(Request $request)
  {
    try {
      return $this->service->buscar($request);
    } catch (\Exception $e) {

    }
  }

  public function exemplo(){
    return view('trofeus.exemplo');
  }

  public function salvarExemplo(Request $request){
    dd($request->all());
  }
}
