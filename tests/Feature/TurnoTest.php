<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Turno;

class TurnoTest extends TestCase
{
    public function test_CrearTurno()
    {
        $datosAInsertar = [
            "horaInicio" => "12:30:00",
            "horaFinal" => "20:30:00"
        ];
        
        $response = $this->post('/api/v2/turnos', $datosAInsertar);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El turno fue creado con exito."
        ]);

        $this->delete('/api/v2/turnos/2');
    }

    public function test_CrearTurnoSinMandarDatos()
    {
        $response = $this->post('/api/v2/turnos/');
        $response->assertStatus(401); 
    }

    public function test_EliminarUnTurnoExistente()
    {
        $response = $this->delete('/api/v2/turnos/1');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El turno fue eliminado con exito."
        ]);
        $this->assertDatabaseMissing("turnos",[
            "idTurno" => 1,
            "deleted_at" => null
        ]);

        Turno::withTrashed()->where("idTurno", 1)->restore();
    }

    public function test_EliminarUnTurnoInexistente()
    {
        $response = $this->delete('/api/v2/turnos/9999');
        $response->assertStatus(404);
    }
}
