<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Chofer;
use App\Models\Vehiculo;
use App\Models\Maneja;

class VehiculoController extends Controller
{
    public function bloquearTablasASoloEscritura(){
        DB::raw('LOCK TABLE vehiculos WRITE');
        DB::raw('LOCK TABLE maneja WRITE');
    }

    public function CrearVehiculo($request)
    {
        $this->bloquearTablasASoloEscritura();
        DB::beginTransaction();

        Vehiculo::create([
            "matricula" => $request->input("matricula"),
            "capacidad" => $request->input("capacidad"),
            "pesomaximo" => $request->input("pesoMaximo"),
            "modelo" => $request->input("modelo")
        ]);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El vehiculo fue creado con exito."];
    }

    public function ValidarRegistro(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'matricula' => 'required|min:8|max:8|unique:vehiculos',
            'capacidad' => 'required|numeric',
            'pesoMaximo' => 'required|numeric',
            'modelo' => 'required|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        return $this->CrearVehiculo($request);      
    }

    public function Modificar(Request $request, $matricula)
    {
        $validation = Validator::make($request->all(),[
            'matricula' => 'required|min:8|max:8',
            'capacidad' => 'required|numeric',
            'pesoMaximo' => 'required|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $vehiculo = Vehiculo::where('matricula', $matricula)->first();

        if($vehiculo === null)
            return response(["mensaje" => "La matricula no pertenece a ningun vehiculo del sistema."], 404);
    
        $this->bloquearTablasASoloEscritura();
        DB::beginTransaction();

        $vehiculo->capacidad = $request->input("capacidad");
        $vehiculo->pesomaximo = $request->input("pesoMaximo");
        $vehiculo->save();

        DB::commit();
        DB::raw('UNLOCK TABLES');
        
        return ["mensaje" => "El vehiculo con la matricula $matricula ha sido modificado."];
    }

    public function Eliminar(Request $request, $matricula)
    {
        $validation = Validator::make(['matricula' => $matricula],[
            'matricula' => 'required|min:8|max:8'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $vehiculo = Vehiculo::where('matricula', $matricula)->first();

        if($vehiculo === null)
            return response(["mensaje" => "La matricula no pertenece a ningun vehiculo del sistema."], 404);

        $relacionConChofer = Maneja::where('idvehiculo', $vehiculo->idVehiculo)->first();

        if($relacionConChofer != null)
            return ["mensaje" => "El vehiculo a eliminar cuenta con un chofer asignado. Primero debe despojar al chofer."];

        $this->bloquearTablasASoloEscritura();
        DB::beginTransaction();

        $vehiculo->delete();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El vehiculo con la matricula $matricula fue eliminado con exito."];
    }

    public function AsignarChofer(Request $request, $documentoDeIdentidad)
    {
        $validation = Validator::make($request->all(),[
            'documentoDeIdentidad' => 'required|digits:8|numeric',
            'matricula' => 'required|min:8|max:8'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        Chofer::findOrFail($documentoDeIdentidad);

        $matricula = $request -> input("matricula");
        $modeloVehiculo = Vehiculo::where('matricula', $matricula)->first();

        if($modeloVehiculo === null)
            return response(["mensaje" => "La matricula no pertenece a ningun vehiculo del sistema."], 404);

        $this->bloquearTablasASoloEscritura();
        DB::beginTransaction();

        Maneja::create([
            "docDeIdentidad" => $documentoDeIdentidad,
            "idVehiculo" => $modeloVehiculo->idVehiculo
        ]);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "Se ha asignado al chofer correctamente."];
    }

    public function RelegarChofer(Request $request, $documentoDeIdentidad)
    {
        $validation = Validator::make(['documentoDeIdentidad' => $documentoDeIdentidad],[
            'documentoDeIdentidad' => 'required|digits:8|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $maneja = Maneja::findOrFail($documentoDeIdentidad);

        $this->bloquearTablasASoloEscritura();
        DB::beginTransaction();

        $maneja->delete();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El chofer ha sido relegado del vehiculo correctamente."];   
    }
}