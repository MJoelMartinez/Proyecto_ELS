<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Administrador;
use App\Models\Gerente;
use App\Models\Cargador;
use App\Models\Chofer;

class UsuarioController extends Controller

{

    public function CrearUsuario($request){
        Usuario:create([
            "DocDeIdentidad" => $request -> $_POST("documentoDeIdentidad"),
            "UsuarioLogin" => $request -> $_POST("nombreDeUsuarioLogin"),
            "Contrasenia" => $request -> $_POST("contrasenia"),
            "Nombre" => $request -> $_POST("nombre"),
            "Apellido" => $request -> $_POST("apellido"),
            "Telefono" => $request -> $_POST("telefono"),
            "Direccion" => $request -> $_POST("direccion")
        ]);
    }

    public function IdentificarRol($request){
        $rol = $request -> $_POST("rolDeLaEmpresa");
        if ($rol === "administrador") {
            CrearAdministrador($request);
        }
        if ($rol === "gerente") {
            CrearGerente($request);
        }
        if ($rol === "cargador") {
            CrearCargador($request);
        }
        if ($rol === "chofer") {
            CrearChofer($request);
        }
    }

    public function CrearAdministrador($request){
        Administrador:create([
            "DocDeIdentidad" => $request -> $_POST("documentoDeIdentidad"),
            "NumeroAdmin" => $request -> $_POST("numeroDeAdministrador")
        ]);
    }

    public function CrearGerente($request){
        Gerente:create([
            "DocDeIdentidad" => $request -> $_POST("documentoDeIdentidad"),
            "NumeroGerente" => $request -> $_POST("numeroDeGerente")
        ]);
    }

    public function CrearCargador($request){
        Cargador:create([
            "DocDeIdentidad" => $request -> $_POST("documentoDeIdentidad"),
            "NumeroCargador" => $request -> $_POST("numeroDeCargador")
        ]);
    }

    public function CrearChofer($request){
        Chofer:create([
            "DocDeIdentidad" => $request -> $_POST("documentoDeIdentidad"),
            "NumeroChofer" => $request -> $_POST("numeroDeChofer")
        ]);
    }

    public function Crear(Request $request){
        CrearUsuario($request);
        IdentificarRol($request);
    }

    public function Eliminar(Request $request){
        $usuario = Usuario::findOrFail($documentoDeIdentidad);
        $usuario -> delete();
    }

    public function Modificar(Request $request){
        $usuario = Usuario::findOrFail($documentoDeIdentidad);
        $usuario -> DocDeIdentidad = $request -> $_POST("documentoDeIdentidad");
        $usuario -> UsuarioLogin = $request -> $_POST("nombreDeUsuarioLogin");
        $usuario -> Nombre = $request -> $_POST("nombre");
        $usuario -> Apellido = $request -> $_POST("apellido");
        $usuario -> Telefono = $request -> $_POST("telefono");
        $usuario -> Direccion = $request -> $_POST("direccion");
        $usuario -> save();
    }
}
