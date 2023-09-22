<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Turno;

class turnoController extends Controller
{
    public function BloquearTablaTurno()
    {
        DB::raw('LOCK TABLE turnos WRITE');
    }

    public function Crear(Request $request)
    {
        $horaInicio = date('H:i:s', strtotime($request->input('horaInicio')));
        $horaFinal = date('H:i:s', strtotime($request->input('horaFinal')));

        $validation = Validator::make(['horaInicio' => $horaInicio, 'horaFinal' => $horaFinal],[
            'horaInicio' => 'required',
            'horaFinal' => 'required'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $this->bloquearTablaTurno();
        DB::beginTransaction();

        Turno::create([
            "horaInicio" => $horaInicio,
            "horaFinal" => $horaFinal
        ]);

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El turno fue creado con exito."];
    }

    public function Eliminar(Request $request, $idTurno)
    {
        $validation = Validator::make(['idTurno' => $idTurno],[
            'idTurno' => 'required|numeric'
        ]);

        if($validation->fails())
            return response($validation->errors(), 401);

        $turno = Turno::findOrFail($idTurno);

        $this->bloquearTablaTurno();
        DB::beginTransaction();

        $turno->delete();

        DB::commit();
        DB::raw('UNLOCK TABLES');

        return ["mensaje" => "El turno fue eliminado con exito."];
    }
}
