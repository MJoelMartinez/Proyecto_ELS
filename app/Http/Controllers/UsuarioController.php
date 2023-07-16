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
            "contrasenia" => $request -> input("contrasenia"),
            "nombre" => $request -> input("nombre"),
            "apellido" => $request -> input("apellido"),
            "telefono" => $request -> input("telefono"),
            "email" => $request -> input("email"),
            "direccion" => $request -> input("direccion")
        ]);
    }

    public function IdentificarRol($request){
        $rol = $request -> input("rolDeLaEmpresa");
        
        return $rol;
    }

    public function CrearRol($rol, $request){
        if ($rol === "administrador")
            $this -> CrearAdministrador($request);
        
        if ($rol === "gerente")
            $this -> CrearGerente($request);
        
        if ($rol === "cargador")
            $this -> CrearCargador($request);
        
        if ($rol === "chofer")
            $this -> CrearChofer($request);
    }

    public function CrearAdministrador($request){
        Administrador::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroAdmin" => $request -> input("numeroDeRol")
        ]);
    }

    public function CrearGerente($request){
        Gerente::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroGerente" => $request -> input("numeroDeRol")
        ]);
    }

    public function CrearCargador($request){
        Cargador::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroCargador" => $request -> input("numeroDeRol")
        ]);
    }

    public function CrearChofer($request){
        Chofer::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroChofer" => $request -> input("numeroDeRol") 
        ]);
    }

    public function Crear(Request $request){
        $this -> CrearUsuario($request);
        if ($this -> IdentificarRol($request) != null)
            $this -> CrearRol($this -> IdentificarRol($request), $request);

        return [ "mensaje" => "Usuario creado correctamente."];
    }

    public function IdentificarRolAEliminar($documentoDeIdentidad){
        $rol = Administrador::where('docDeIdentidad', $documentoDeIdentidad);
        $valoresRol = $rol -> get();

        if (count($valoresRol) != 0)
            return "administrador";
        
        $rol = Gerente::where('docDeIdentidad', $documentoDeIdentidad);
        $valoresRol = $rol -> get();
    
        if (count($valoresRol) != 0)
            return "gerente";

        $rol = Chofer::where('docDeIdentidad', $documentoDeIdentidad);
        $valoresRol = $rol -> get();
        
        if (count($valoresRol) != 0)
            return "chofer";
        
        $rol = Cargador::where('docDeIdentidad', $documentoDeIdentidad);
        $valoresRol = $rol -> get();
        
        if (count($valoresRol) != 0)
             return "cargador";

        return "UsuarioComun";
    }

    public function EliminarRol($rol, $documentoDeIdentidad){
        if ($rol === "administrador")
            Administrador::where('docDeIdentidad', $documentoDeIdentidad) -> delete();
        
        if ($rol === "gerente")
            Gerente::where('docDeIdentidad', $documentoDeIdentidad) -> delete();
        
        if ($rol === "cargador")
            Cargador::where('docDeIdentidad', $documentoDeIdentidad) -> delete();
        
        if ($rol === "chofer")
            Chofer::where('docDeIdentidad', $documentoDeIdentidad) -> delete();
    }

    public function Eliminar(Request $request, $documentoDeIdentidad){
        $usuario = Usuario::where('docDeIdentidad', $documentoDeIdentidad);
        $valoresUsuario = $usuario -> get();

        if (count($valoresUsuario) === 0)
            return [ "mensaje" => "El Usuario no existe en el sistema."];
        
        if (count($valoresUsuario) != 0){
            $usuario -> delete();
            $rolDelUsuario = $this -> IdentificarRolAEliminar($documentoDeIdentidad);
            
            if ($rolDelUsuario != "UsuarioComun")
                $this -> EliminarRol($rolDelUsuario, $documentoDeIdentidad);
            
            return [ "mensaje" => "El Usuario con la cedula $documentoDeIdentidad ha sido eliminado."];
        }
    }

    public function Modificar(Request $request, $documentoDeIdentidad){
        $usuario = Usuario::where('docDeIdentidad', $documentoDeIdentidad);
        $modeloUsuario = $usuario -> first();

        if ($modeloUsuario == null)
            return [ "mensaje" => "El Usuario no existe en el sistema."];
        
        if ($modeloUsuario != null){
            $modeloUsuario -> nombre = $request -> input("nombre");
            $modeloUsuario -> telefono = $request -> input("telefono");
            $modeloUsuario -> direccion = $request -> input("direccion");
            $modeloUsuario -> save();
            return [ "mensaje" => "El Usuario con la cedula $documentoDeIdentidad ha sido modificado."];
        }
    }
}