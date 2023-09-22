<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Articulo;
use App\Models\tipoArticulo;
use App\Models\Articulo_tipoArticulo;

class ArticuloController extends Controller
{
    public function BloquearTablas()
    {
        DB::raw('LOCK TABLE articulos WRITE');
        DB::raw('LOCK TABLE tipoArticulo READ');
        DB::raw('LOCK TABLE articulo_tipoArticulo WRITE');
    }

    public function RelacionarConTipo($idAutomatico, $idTipo)
    {
        Articulo_tipoArticulo::create([
            "idArticulo" => $idAutomatico,
            "idTipo" => $idTipo
        ]);
    }

    public function Crear(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nombre' => 'required|min:2|max:255',
            'anioCreacion' => 'required|digits:4|numeric',
            'tipo' => 'required|alpha|min:1|max:1'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $tipoArticulo = tipoArticulo::where('tipo', $request->input('tipo'))->first();
        if($tipoArticulo == null)
            return response(["mensaje" => "Tipo de articulo inexistente."], 404);

        $this->BloquearTablas();
        DB::beginTransaction();

        $articulo = Articulo::create([
            "nombre" => $request->input("nombre"),
            "anioCreacion" => $request->input("anioCreacion")
        ]);

        $this->RelacionarConTipo($articulo->idArticulo, $tipoArticulo->idTipoArticulo);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return [ "mensaje" => "Articulo registrado correctamente." ];
    }

    public function Modificar(Request $request, $idArticulo)
    {
        $validation = Validator::make(['idArticulo' => $idArticulo],[
            'idArticulo' => 'required|numeric',
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $articulo = Articulo::findOrFail($idArticulo);

        $this->BloquearTablas();
        DB::beginTransaction();

        $articulo->nombre = $request->input("nombre");
        $articulo->save();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "Articulo modificado correctamente."];
    }

    public function Eliminar(Request $request, $idArticulo)
    {
        $validation = Validator::make(['idArticulo' => $idArticulo],[
            'idArticulo' => 'required|numeric',
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $articulo = Articulo::findOrFail($idArticulo);

        $this->BloquearTablas();
        DB::beginTransaction();

        $articulo->delete();
        Articulo_tipoArticulo::where('idArticulo', $idArticulo)->delete();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "Articulo eliminado correctamente."];
    }
}