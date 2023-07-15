<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;

class AlmacenController extends Controller

{

    public function CrearAlmacen($request){
        Almacen::create([
            "capacidad" => $request -> input("capacidad"),
            "direccion" => $request -> input("direccion")
        ]);
    }

    public function Crear(Request $request){
        $this -> CrearAlmacen($request);

        return [ "mensaje" => "Almacen creado correctamente."];
    }

    public function Eliminar(Request $request, $idAlmacen){
        $almacen = Almacen::where('idAlmacen', $idAlmacen);
        $valoresAlmacen = $almacen -> get();

        if (count($valoresAlmacen) === 0)
            return [ "mensaje" => "El Almacen no existe en el sistema."];
        
        if (count($valoresAlmacen) != 0){
            $almacen -> delete();
            return [ "mensaje" => "El Almacen on el id $idAlmacen ha sido eliminado."];
        }
    }

    public function Modificar(Request $request){
        $almacen = Almacen::findOrFail($idAlmacen);
        $almacen -> idAlmacen = $request -> $_POST("idAlmacen");
        $almacen -> capacidad = $request -> $_POST("capacidad");
        $almacen -> direccion = $request -> $_POST("direccion");
        $almacen -> save();
    }
}