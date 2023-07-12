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
        Usuario::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "usuarioLogin" => $request -> input("nombreDeUsuarioLogin"),
            "contrasenia" => $request -> input("contrasenia"),
            "nombre" => $request -> input("nombre"),
            "apellido" => $request -> input("apellido"),
            "telefono" => $request -> input("telefono"),
            "direccion" => $request -> input("direccion")
        ]);
        return "Persona creada correctamente.";
    }

    public function IdentificarRol($request){
        $rol = $request -> input("rolDeLaEmpresa");
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
        Administrador::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroAdmin" => $request -> input("numeroDeAdministrador")
        ]);
    }

    public function CrearGerente($request){
        Gerente::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroGerente" => $request -> input("numeroDeGerente")
        ]);
    }

    public function CrearCargador($request){
        Cargador::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroCargador" => $request -> input("numeroDeCargador")
        ]);
    }

    public function CrearChofer($request){
        Chofer::create([
            "docDeIdentidad" => $request -> $_POST("documentoDeIdentidad"),
            "numeroChofer" => $request -> $_POST("numeroDeChofer") 
        ]);
    }

    public function Crear(Request $request){
        $this->CrearUsuario($request);
        $this->IdentificarRol($request);
    }

    public function Eliminar(Request $request, $documentoDeIdentidad){
        $usuario = Usuario::where('docDeIdentidad', $documentoDeIdentidad);
        $usuario -> delete();

        return [ "mensaje" => "El Usuario con la cédula $documentoDeIdentidad ha sido eliminado."];
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
