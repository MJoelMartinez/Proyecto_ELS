<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Usuario;

class LoginController extends Controller
{
    public function IniciarSesion(Request $request)
    {
        $datosUsuario = [
            'email' => $request->input('email'),
            'contrasenia' => $request->input('contrasenia'),
        ];

        if(Auth::attempt($datosUsuario)){
            return view('Home');
        }
    
        return [ "mensaje" => "Los datos ingresados han sido incorrectos." ];
    }
}
