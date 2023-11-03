<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Modelo;
use App\Models\Vehiculo;

class ModeloController extends Controller
{
    public function bloquearTablaModelos()
    {
        DB::raw('LOCK TABLE modelos WRITE');
    }

    public function CrearModelo($request)
    {
        $this->bloquearTablaModelos();
        DB::beginTransaction();

        Modelo::create([
            "nombre" => $request->input("nombre"),
            "anio" => $request->input("anio")
        ]);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El modelo fue creado con exito."];
    }

    public function ValidarRegistro(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nombre' => 'required|min:2|max:255|unique:modelos',
            'anio' => 'required|min:2000|max:9999|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        return $this->CrearModelo($request);      
    }

    public function Modificar(Request $request, $idModelo)
    {
        $validation = Validator::make($request->all(),[
            'idModelo' => 'required|numeric',
            'nombre' => 'required|min:2|max:255',
            'anio' => 'required|min:2000|max:9999|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $modelo = Modelo::findOrFail($idModelo);

        $this->bloquearTablaModelos();
        DB::beginTransaction();

        $modelo->nombre = $request->input("nombre");
        $modelo->anio = $request->input("anio");
        $modelo->save();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El modelo con el ID $idModelo fue modificado con exito."];
    }

    public function Eliminar(Request $request, $idModelo)
    {
        $validation = Validator::make(['idModelo' => $idModelo],[
            'idModelo' => 'required|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $modelo = Modelo::findOrFail($idModelo);

        $vehiculoConModelo = Vehiculo::where('modelo', $idModelo)->first();

        if($vehiculoConModelo != null)
            return ["mensaje" => "Existe uno o mas vehiculos que cuentan con este modelo. Primero eliminelos."];

        $this->bloquearTablaModelos();
        DB::beginTransaction();

        $modelo->delete();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El modelo con el ID $idModelo fue eliminado con exito."];
    }
}
