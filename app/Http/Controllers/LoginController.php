<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            
            return view('backoffice');
        }
        
        return [ "mensaje" => "Los datos ingresados han sido incorrectos." ];
    }
}
