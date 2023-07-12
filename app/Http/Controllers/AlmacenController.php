<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller

{

    public function CrearAlmacen($request){
        Almacen::create([
            "idAlmacen" => $request -> input("idAlmacen"),
            "capacidad" => $request -> input("capacidad"),
            "direccion" => $request -> input("direccion")
        ]);
        return "Almacen creado correctamente.";
    }

    public function Crear(Request $request){
        $this->CrearAlmacen($request);
    }

    public function Eliminar(Request $request, $idAlmacen){
        $almacen = Almacen::where('idAlmacen', $idAlmacen) -> findOrFail();
        $almacen -> delete();

        return [ "mensaje" => "El almacen con el id $idAlmacen ha sido eliminado."];
    }

    public function Modificar(Request $request){
        $almacen = Almacen::findOrFail($idAlmacen);
        $almacen -> idAlmacen = $request -> $_POST("idAlmacen");
        $almacen -> capacidad = $request -> $_POST("capacidad");
        $almacen -> direccion = $request -> $_POST("direccion");
        $almacen -> save();
    }
}