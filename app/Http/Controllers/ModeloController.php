<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Modelo;

class ModeloController extends Controller
{
    public function CrearModelo($request)
    {
        Modelo::create([
            "nombre" => $request->input("nombre"),
            "anio" => $request->input("anio")
        ]);

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

    public function Eliminar(Request $request, $idModelo)
    {
        $modelo = Modelo::findOrFail($idModelo);
        $modelo->delete();

        return ["mensaje" => "El modelo con el id $idModel fue eliminado con exito."];
    }
}
