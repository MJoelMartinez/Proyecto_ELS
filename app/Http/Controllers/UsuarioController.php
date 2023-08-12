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

class UsuarioController extends Controller
{
    public function CrearUsuario($request)
    {
        Usuario::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "contrasenia" => Hash::make($request->input("contrasenia")),
            "nombre" => $request->input("nombre"),
            "apellido" => $request->input("apellido"),
            "telefono" => $request->input("telefono"),
            "email" => $request->input("email"),
            "direccion" => $request->input("direccion")
        ]);
    }

    public function IdentificarRol($request)
    {
        $rol = $request->input("rolDeLaEmpresa");
        
        return $rol;
    }

    public function CrearRol($rol, $request)
    {
        if ($rol === "administrador")
            $this->CrearAdministrador($request);
        
        if ($rol === "gerente")
            $this->CrearGerente($request);
        
        if ($rol === "cargador")
            $this->CrearCargador($request);
        
        if ($rol === "chofer")
            $this->CrearChofer($request);
    }

    public function CrearAdministrador($request)
    {
        Administrador::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "numeroAdmin" => $request->input("numeroDeRol")
        ]);
    }

    public function CrearGerente($request)
    {
        Gerente::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "numeroGerente" => $request->input("numeroDeRol")
        ]);
    }

    public function CrearCargador($request)
    {
        Cargador::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "numeroCargador" => $request->input("numeroDeRol"),
            "carnetTransporte" => $request->input("carnetTransporte")
        ]);
    }

    public function CrearChofer($request)
    {
        Chofer::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "numeroChofer" => $request->input("numeroDeRol") 
        ]);
    }

    public function Crear($request)
    {
        $this->CrearUsuario($request);
        if ($this->IdentificarRol($request) != null)
            $this->CrearRol($this->IdentificarRol($request), $request);

        return [ "mensaje" => "Usuario creado correctamente."];
    }
    
    public function ValidarRegistro(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'documentoDeIdentidad' => 'required|min:8|max:8',
            'contrasenia' => 'required|min:8|max:16|confirmed',
            'nombre' => 'required|min:1|max:255',
            'apellido' => 'required|min:2|max:255',
            'telefono' => 'required|min:7|max:9',
            'email' => 'required|email|unique:usuarios',
            'direccion' => 'required|min:4|max:40'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        return $this->Crear($request);      
    }
}
