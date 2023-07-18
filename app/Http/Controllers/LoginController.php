<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function IniciarSesion(Request $request)
    {
        $datosUsuario = $request -> validate([
            'email' => ['required', 'email'],
            'contrasenia' => ['required'],
        ]);
 
        if (Auth::attempt($datosUsuario)) {
            $request -> session() -> regenerate();
 
            return redirect() -> intended('dashboard');
        }
 
        return back() -> withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
