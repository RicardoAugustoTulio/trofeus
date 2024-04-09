<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function showLoginForm()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
      // Autenticação bem-sucedida
      return redirect()->route('home');
    }

    // Autenticação falhou
    return back()->withErrors(['email' => 'Credenciais inválidas']);
  }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
}
