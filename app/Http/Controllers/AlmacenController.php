<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use App\Models\Paquete;
use App\Models\Lote;
use App\Models\ArticuloPaquete;
use App\Models\PaqueteLote;

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
        $almacen = Almacen::findOrFail($idAlmacen);
        $almacen -> delete();

        return [ "mensaje" => "El almacen con el ID $idAlmacen fue eliminado correctamente."];
    }

    public function Modificar(Request $request, $idAlmacen){
        $almacen = Almacen::findOrFail($idAlmacen);

        $almacen -> capacidad = $request -> input("capacidadAlmacen");
        $almacen -> direccion = $request -> input("direccionAlmacen");
        $almacen -> save();

        return [ "mensaje" => "El almacen con el ID $idAlmacen fue modificado correctamente."];
    }

    public function CrearLote(Request $request){
        Lote::create([
            "cantidadPaquetes" => $request -> input("cantidadPaquetes")
        ]);

        $idAutomatico = $modeloTablaLote -> id;

        CrearPaqueteLote($request, $idAutomatico);

        return [ "mensaje" => "Lote creado correctamente." ];
    }

    public function CrearPaqueteLote($request, $idAutomatico){
        ArticuloPaquete::create([
            "idLote" => $idAutomatico,
            "idPaquete" => $request -> input("idPaquete")
        ]);
    }

    public function CrearPaquete(Request $request){
        $modeloTablaPaquete = Paquete::create([
            "cantidadArticulos" => $request -> input("cantidadArticulos"),
            "peso" => "0"
        ]);

        $idAutomatico = $modeloTablaPaquete -> id;

        CrearArticuloPaquete($request, $idAutomatico);

        return [ "mensaje" => "Paquete creado correctamente." ];
    }

    public function CrearArticuloPaquete($request, $idAutomatico){
        ArticuloPaquete::create([
            "idArticulo" => $request -> input("idArticulo"),
            "idPaquete" => $idAutomatico
        ]);
    }

    public function AsignarPesoDePaquete(Request $request, $idPaquete){
        $paquete = Paquete::findOrFail($idPaquete);

        $paquete -> peso = $request -> input("peso");
        $paquete -> save();

        return [ "mensaje" => "Se ha asignado el peso al Paquete $idPaquete correctamente." ];
    }

    public function CrearArticulo(Request $request){
        Articulo::create([
            "nombreArticulo" => $request -> input("nombreArticulo"),
            "anioCreacion" => $request -> input("anioCreacion")
        ]);
    }
}