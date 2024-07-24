<?php

namespace App\Http\Controllers;

use App\Models\Campus\Campus;
use App\Models\Modalidades\Modalidades;
use App\Models\Trofeu\Trofeu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $trofeus = Trofeu::paginate(15);

    return view('content.dashboard.dashboards-analytics')
      ->with('trofeus', $trofeus);
  }

  public function buscar(Request $request)
  {
    $trofeus = Trofeu::search($request->q);
    $campus = Campus::all();
    $modalidades = Modalidades::all();

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

    $trofeus = $trofeus->paginate();

    return view('content.dashboard.busca', compact('trofeus','campus','modalidades'));
  }

}
