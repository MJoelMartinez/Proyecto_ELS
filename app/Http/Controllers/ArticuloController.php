<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Articulo;

class ArticuloController extends Controller
{
    public function CrearArticulo(Request $request)
    {
        Articulo::create([
            "nombre" => $request->input("nombreArticulo"),
            "anioCreacion" => $request->input("anioCreacion")
        ]);

        return [ "mensaje" => "Articulo asignado correctamente." ];
    }

    public function ModificarArticulo(Request $request, $idArticulo)
    {
        $articulo = Articulo::findOrFail($idArticulo);

        $articulo->nombre = $request->input("nombreArticulo");
        $articulo->save();

        return ["mensaje" => "Articulo modificado correctamente."];
    }

    public function EliminarArticulo(Request $request, $idArticulo)
    {
        $articulo = Articulo::findOrFail($idArticulo);
        $articulo->delete();

        return ["mensaje" => "El articulo con el id $idArticulo fue eliminado correctamente."];
    
    }
}
