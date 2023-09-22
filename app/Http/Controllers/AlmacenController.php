<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Almacen;
use App\Models\Cargador;
use App\Models\Gerente;

class AlmacenController extends Controller
{
    public function BloquearTablas()
    {
        DB::raw('LOCK TABLE almacenes WRITE');
    }

    public function BloquearTablasUsuarios()
    {
        DB::raw('LOCK TABLE cargadores WRITE');
        DB::raw('LOCK TABLE gerentes WRITE');
    }

    public function Crear(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'capacidad' => 'required|numeric',
            'direccion' => 'required|max:40',
            'idDepartamento' => 'required|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $this->BloquearTablas();
        DB::beginTransaction();
        
        Almacen::create([
            "capacidad" => $request->input("capacidad"),
            "direccion" => $request->input("direccion"),
            "idDepartamento" => $request->input("idDepartamento")
        ]);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El almacen fue registrado con exito."];
    }

    public function Modificar(Request $request, $idAlmacen)
    {
        $validation = Validator::make($request->all(),[
            'idAlmacen' => 'required|numeric',
            'capacidad' => 'required|numeric',
            'direccion' => 'required|min:2|max:40',
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $almacen = Almacen::findOrFail($idAlmacen);

        $this->BloquearTablas();
        DB::beginTransaction();

        $almacen->capacidad = $request->input("capacidad");
        $almacen->direccion = $request->input("direccion");
        $almacen->save();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El almacen fue modificado con exito."];
    }

    public function Eliminar(Request $request, $idAlmacen)
    {
        $validation = Validator::make(['idAlmacen' => $idAlmacen],[
            'idAlmacen' => 'required|numeric',
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $almacen = Almacen::findOrFail($idAlmacen);

        $this->BloquearTablas();
        DB::beginTransaction();

        $almacen->delete();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El almacen fue eliminado con exito."];
    }

    public function AsignarEmpleado(Request $request, $idAlmacen, $documentoDeIdentidad)
    {
        $validation = Validator::make(['idAlmacen' => $idAlmacen, 'documentoDeIdentidad' => $documentoDeIdentidad],[
            'idAlmacen' => 'required|numeric',
            'documentoDeIdentidad' => 'required|numeric|digits:8'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $gerente = Gerente::find($documentoDeIdentidad);
        $cargador = Cargador::find($documentoDeIdentidad);

        if($gerente == null && $cargador == null)
            return response(["mensaje" => "No se han encontrado funcionarios con esa CI."], 404);

        $this->BloquearTablasUsuarios();
        DB::beginTransaction();

        if($gerente != null)
        {
            $gerente->idAlmacen = $idAlmacen;
            $gerente->save();
        }

        if($cargador != null)
        {
            $cargador->idAlmacen = $idAlmacen;
            $cargador->save();
        }

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "Funcionario asignado con exito."];
    }

    public function RelegarEmpleado(Request $request, $documentoDeIdentidad)
    {
        $validation = Validator::make(['documentoDeIdentidad' => $documentoDeIdentidad],[
            'documentoDeIdentidad' => 'required|numeric|digits:8',
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $gerente = Gerente::find($documentoDeIdentidad);
        $cargador = Cargador::find($documentoDeIdentidad);

        if($gerente == null && $cargador == null)
            return response(["mensaje" => "No se han encontrado funcionarios con esa CI."], 404);

        $this->BloquearTablasUsuarios();
        DB::beginTransaction();

        if($gerente != null)
        {
            $gerente->idAlmacen = 0;
            $gerente->save();
        }

        if($cargador != null)
        {
            $cargador->idAlmacen = 0;
            $cargador->save();
        }

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "Funcionario relegado con exito."];
    }
}
