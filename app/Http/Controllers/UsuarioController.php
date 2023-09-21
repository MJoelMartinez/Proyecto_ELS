<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Usuario;
use App\Models\UserUsuario;
use App\Models\Administrador;
use App\Models\Gerente;
use App\Models\Cargador;
use App\Models\Chofer;
use App\Models\Licencia;

class UsuarioController extends Controller
{
    public function bloquearTablasASoloEscritura(){
        DB::raw('LOCK TABLE usuarios WRITE');
        DB::raw('LOCK TABLE users WRITE');
        DB::raw('LOCK TABLE user_usuario WRITE');
        DB::raw('LOCK TABLE administradores WRITE');
        DB::raw('LOCK TABLE choferes WRITE');
        DB::raw('LOCK TABLE gerentes WRITE');
        DB::raw('LOCK TABLE cargadores WRITE');
        DB::raw('LOCK TABLE licencias WRITE');
    }

    public function CrearRelacionUserUsuario($request, $idAutomatico)
    {
        UserUsuario::create([
            "id" => $idAutomatico,
            "docDeIdentidad" => $request->input("documentoDeIdentidad")
        ]);
    }
    
    public function CrearUser($request)
    {
        $modeloTablaUser = User::create([
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("contrasenia"))
        ]);

        $idAutomatico = $modeloTablaUser->id;

        $this->CrearRelacionUserUsuario($request, $idAutomatico);
    }
    
    public function CrearUsuario($request)
    {
        Usuario::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "nombre" => $request->input("nombre"),
            "apellido" => $request->input("apellido"),
            "telefono" => $request->input("telefono"),
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
            "backoffice" => 1
        ]);
    }

    public function CrearGerente($request)
    {
        Gerente::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad")
        ]);
    }

    public function CrearCargador($request)
    {
        Cargador::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "carnetTransporte" => $request->input("carnetTransporte")
        ]);
    }

    public function CrearChofer($request)
    {
        Chofer::create([
            "docDeIdentidad" => $request->input("documentoDeIdentidad")
        ]);
        $this->CrearLicencia($request);
    }

    public function CrearLicencia($request)
    {
        $fechaDesde = $request->input("anioDesde") . "-" . $request->input("mesDesde") . "-" . $request->input("diaDesde");
        $fechaHasta = $request->input("anioHasta") . "-" . $request->input("mesHasta") . "-" . $request->input("diaHasta");

        Licencia::create([
            "idLicencia" => $request->input("idLicencia"),
            "validoDesde" => $fechaDesde,
            "validoHasta" => $fechaHasta,
            "docDeIdentidad" => $request->input("documentoDeIdentidad"),
            "categoria" => 'H'
        ]);
    }

    public function Crear($request)
    {
        $this -> bloquearTablasASoloEscritura();
        DB::beginTransaction();

        $this->CrearUsuario($request);
        $this->CrearUser($request);

        if ($this->IdentificarRol($request) != null)
            $this->CrearRol($this->IdentificarRol($request), $request);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return [ "mensaje" => "Usuario creado correctamente."];
    }
    
    public function ValidarRegistro(Request $request)
    {
        $mensajesDeError = [];

        $validation = Validator::make($request->all(),[
            'documentoDeIdentidad' => 'required|min:8|max:8',
            'contrasenia' => 'required|min:8|max:16|confirmed',
            'nombre' => 'required|min:1|max:255',
            'apellido' => 'required|min:2|max:255',
            'telefono' => 'required|min:7|max:9',
            'email' => 'required|email',
            'direccion' => 'required|min:4|max:40'
        ]);

        if ($this->IdentificarRol($request) === "chofer")
        {
            $validationLicencia = Validator::make($request->all(),[
                'idLicencia' => 'required|min:8|max:8',
                'diaDesde' => 'required|numeric|min:1|max:31',
                'mesDesde' => 'required|numeric|min:1|max:12',
                'anioDesde' => 'required|numeric|min:1960|max:2007',
                'diaHasta' => 'required|numeric|min:1|max:31',
                'mesHasta' => 'required|numeric|min:1|max:12',
                'anioHasta' => 'required|numeric|min:2024|max:9999',
            ]);

            $validationLicencia->after(function ($validationLicencia) use ($request) {
                $diaDesde = $request->input('diaDesde');
                $mesDesde = $request->input('mesDesde');
                $anioDesde = $request->input('anioDesde');
                $diaHasta = $request->input('diaHasta');
                $mesHasta = $request->input('mesHasta');
                $anioHasta = $request->input('anioHasta');
            
                if (!checkdate($mesDesde, $diaDesde, $anioDesde) || !checkdate($mesHasta, $diaHasta, $anioHasta)) {
                    $validationLicencia->errors()->add('erroresDeFecha', 'La fecha proporcionada es innexistente.');
                }
            });

            if($validationLicencia->fails()){
                $mensajesDeError['erroresDeLicencia'] = $validationLicencia->errors();
            }
        }

        if($validation->fails() || count($mensajesDeError) != 0){
            $mensajesDeError['erroresDeUsuario'] = $validation->errors();

            return response($mensajesDeError, 401);
        }   

        return $this->Crear($request);      
    }

    public function Modificar(Request $request, $documentoDeIdentidad)
    {
        $this->bloquearTablasASoloEscritura();

        $usuario = Usuario::findOrFail($documentoDeIdentidad);
    
        $usuario->nombre = $request->input("nombre");
        $usuario->telefono = $request->input("telefono");
        $usuario->direccion = $request->input("direccion");
        $usuario->save();

        DB::commit();
        DB::raw('UNLOCK TABLES');
        
        return ["mensaje" => "El Usuario con la cedula $documentoDeIdentidad ha sido modificado."];
    }

    public function IdentificarRolAEliminar($documentoDeIdentidad)
    {
        $rol = Administrador::find($documentoDeIdentidad);

        if ($rol != null)
            return "administrador";

        $rol = Gerente::find($documentoDeIdentidad);

        if ($rol != null)
            return "gerente";

        $rol = Chofer::find($documentoDeIdentidad);

        if ($rol != null)
            return "chofer";

        $rol = Cargador::find($documentoDeIdentidad);

        if ($rol != null)
            return "cargador";

        return "UsuarioComun";
    }

    public function EliminarRol($rol, $documentoDeIdentidad)
    {
        if ($rol === "administrador")
            Administrador::findOrFail($documentoDeIdentidad)->delete();
        
        if ($rol === "gerente")
            Gerente::findOrFail($documentoDeIdentidad)->delete();
        
        if ($rol === "cargador")
            Cargador::findOrFail($documentoDeIdentidad)->delete(); 
        
        if ($rol === "chofer")
            Chofer::findOrFail($documentoDeIdentidad)->delete();
            Licencia::where("docDeIdentidad", $documentoDeIdentidad)->delete();
    }

    public function EliminarTablas($usuario, $relacionUserUsuario, $user)
    {
        $relacionUserUsuario->delete();
        $usuario->delete();
        $user->delete();
    }

    public function Eliminar(Request $request, $documentoDeIdentidad)
    {
        $usuario = Usuario::findOrFail($documentoDeIdentidad);
        $relacionUserUsuario = UserUsuario::where('docDeIdentidad', $documentoDeIdentidad)->first();
        $user = User::where('id', $relacionUserUsuario->id)->first();

        $this->bloquearTablasASoloEscritura();

        $this->EliminarTablas($usuario, $relacionUserUsuario, $user);

        $rolDelUsuario = $this->IdentificarRolAEliminar($documentoDeIdentidad);
        if ($rolDelUsuario != "UsuarioComun")
            $this->EliminarRol($rolDelUsuario, $documentoDeIdentidad);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return [ "mensaje" => "El Usuario con la cedula $documentoDeIdentidad ha sido eliminado."];     
    }

    public function ListarSoloUsuariosExistentes()
    {
        if (count(Usuario::all()) == 0)
            return [ "mensaje" => "No hay Usuarios actualmente en el sistema." ];

        return Usuario::all();
    }

    public function ListarSoloUsuariosEliminados()
    {
        if (count(Usuario::onlyTrashed()->get()) == 0)
            return [ "mensaje" => "No se han eliminado Usuarios en este sistema." ];

        return Usuario::onlyTrashed()->get();
    }

    public function ListarTodosLosUsuarios()
    {
        if (count(Usuario::withTrashed()->get()) == 0)
            return [ "mensaje" => "No hay registro de Usuarios en el sistema." ];

        return Usuario::withTrashed()->get();
    }

    public function Buscar(Request $request)
    {
        $filtroDeBusqueda = $request->input('filtroDeLista');

        if ($filtroDeBusqueda === "usuariosExistentes")
            return $this->ListarSoloUsuariosExistentes();

        if ($filtroDeBusqueda === "usuariosEliminados")
            return $this->ListarSoloUsuariosEliminados();

        if ($filtroDeBusqueda === "todosLosUsuarios")
            return $this->ListarTodosLosUsuarios();
    }
}