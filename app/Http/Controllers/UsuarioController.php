<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Usuario;
use App\Models\Administrador;
use App\Models\Gerente;
use App\Models\Cargador;
use App\Models\Chofer;

use Lcobucci\JWT\Parser;

class UsuarioController extends Controller
{

    public function CrearUsuario($request){
        Usuario::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "contrasenia" => Hash::make($request -> input("contrasenia")),
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
            "numeroCargador" => $request -> input("numeroDeRol"),
            "carnetTransporte" => $request -> input("carnetTransporte")
        ]);
    }

    public function CrearChofer($request){
        Chofer::create([
            "docDeIdentidad" => $request -> input("documentoDeIdentidad"),
            "numeroChofer" => $request -> input("numeroDeRol") 
        ]);
    }

    public function Crear($request){
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
            Administrador::findOrFail($documentoDeIdentidad) -> delete();
        
        if ($rol === "gerente")
            Gerente::findOrFail($documentoDeIdentidad) -> delete();
        
        if ($rol === "cargador")
            Cargador::findOrFail($documentoDeIdentidad) -> delete(); 
        
        if ($rol === "chofer")
            Chofer::findOrFail($documentoDeIdentidad) -> delete();
    }

    public function Eliminar(Request $request, $documentoDeIdentidad){
        $usuario = Usuario::findOrFail($documentoDeIdentidad);
        $usuario -> delete();

        $rolDelUsuario = $this -> IdentificarRolAEliminar($documentoDeIdentidad);
        if ($rolDelUsuario != "UsuarioComun")
            $this -> EliminarRol($rolDelUsuario, $documentoDeIdentidad);

        return [ "mensaje" => "El Usuario con la cedula $documentoDeIdentidad ha sido eliminado."];     
    }

    public function Modificar(Request $request, $documentoDeIdentidad){
        $usuario = Usuario::findOrFail($documentoDeIdentidad);
    
        $usuario -> nombre = $request -> input("nombre");
        $usuario -> telefono = $request -> input("telefono");
        $usuario -> direccion = $request -> input("direccion");
        $usuario -> save();
        
        return ["mensaje" => "El Usuario con la cedula $documentoDeIdentidad ha sido modificado."];
    }

    public function ValidarRegistro(Request $request){

        $validation = Validator::make($request->all(),[
            'documentoDeIdentidad' => 'required|min:8|max:8',
            'contrasenia' => 'required|min:8|max:16|confirmed',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'telefono' => 'required|min:7|max:9',
            'email' => 'required|email|unique:usuarios',
            'direccion' => 'required|max:40'
        ]);

        if($validation->fails())
            return $validation->errors();

        return $this -> Crear($request);
        
    }
}