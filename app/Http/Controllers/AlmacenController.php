<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Almacen;

class AlmacenController extends Controller

{

    public function CrearAlmacen($request)
    {
        Almacen::create([
            "capacidad" => $request->input("capacidad"),
            "direccion" => $request->input("direccion")
        ]);
    }

    public function Crear(Request $request)
    {
        $this->CrearAlmacen($request);

        return [ "mensaje" => "Almacen creado correctamente."];
    }

    public function Eliminar(Request $request, $idAlmacen)
    {
        $almacen = Almacen::findOrFail($idAlmacen);
        $almacen->delete();

        return [ "mensaje" => "El almacen con el ID $idAlmacen fue eliminado correctamente."];
    }

    public function Modificar(Request $request, $idAlmacen)
    {
        $almacen = Almacen::findOrFail($idAlmacen);

        $almacen->capacidad = $request->input("capacidadAlmacen");
        $almacen->direccion = $request->input("direccionAlmacen");
        $almacen->save();

        return [ "mensaje" => "El almacen con el ID $idAlmacen fue modificado correctamente."];
    }
}