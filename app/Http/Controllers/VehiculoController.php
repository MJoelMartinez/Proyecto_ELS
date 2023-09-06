<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    public function CrearVehiculo($request)
    {
        Vehiculo::create([
            "matricula" => $request->input("matricula"),
            "capacidad" => $request->input("capacidad"),
            "pesoMaximo" => $request->input("pesoMaximo"),
            "modelo" => $request->input("modelo")
        ]);

        return ["mensaje" => "El vehiculo fue creado con exito."];
    }

    public function ValidarRegistro(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'matricula' => 'required|min:8|max:8|unique:vehiculos',
            'capacidad' => 'required|numeric',
            'pesoMaximo' => 'required|numeric',
            'modelo' => 'required|min:2|max:255'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        return $this->CrearVehiculo($request);      
    }

    public function Modificar(Request $request, $idVehiculo)
    {
        $vehiculo = Vehiculo::findOrFail($idVehiculo);
    
        $vehiculo->capacidad = $request->input("capacidad");
        $vehiculo->pesoMaximo = $request->input("pesoMaximo");
        $vehiculo->save();
        
        return ["mensaje" => "El vehiculo con el id $idVehiculo ha sido modificado."];
    }

    public function Eliminar(Request $request, $idVehiculo)
    {
        $vehiculo = Vehiculo::findOrFail($idVehiculo);
        $vehiculo->delete();

        return ["mensaje" => "El vehiculo con el id $idVehiculo fue eliminado con exito."];
    }
}
