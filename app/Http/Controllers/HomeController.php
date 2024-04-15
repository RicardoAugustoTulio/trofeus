<?php

namespace App\Http\Controllers;

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
}
