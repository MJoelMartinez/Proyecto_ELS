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
        $datosUsuario = $request -> validate([
            'email' => ['required', 'email'],
            'contrasenia' => ['required'],
        ]);
 
        return [ "mensaje" => "Los datos ingresados han sido incorrectos." ];
    }

    public function ValidarToken(Request $request){
        return auth('api')->Usuario();
    }

    public function CerrarSesion(Request $request){
        $request -> Usuario() -> token() -> revoke();

        return ['mensaje' => 'Token Revocado.']; 
    }
}
