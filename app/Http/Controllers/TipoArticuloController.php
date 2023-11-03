<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\TipoArticulo;

class TipoArticuloController extends Controller
{
    public function BloquearTablaTipo(){
        DB::raw('LOCK TABLE tipoArticulo WRITE');
    }

    public function Crear(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'tipo' => 'required|alpha|min:1|max:1|unique:tipoArticulo'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $this->BloquearTablaTipo();
        DB::beginTransaction();

        TipoArticulo::create([
            "tipo" => $request->input('tipo')
        ]);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "Tipo de articulo registrado con exito."];
    }
}
