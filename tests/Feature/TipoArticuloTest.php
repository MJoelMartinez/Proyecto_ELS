<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TipoArticuloTest extends TestCase
{
    public function test_CrearTipoArticulo()
    {
        $datosAInsertar = [
            "tipo" => "Z"
        ];
        $response = $this->post('/api/v2/tipoArticulo', $datosAInsertar);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Tipo de articulo registrado con exito."
        ]);

        $this->delete('/api/v2/turnos/2');
    }
    public function test_CrearTipoArticuloSinDatos()
    {
        $response = $this->post('/api/v2/tipoArticulo');
        $response->assertStatus(401);
    }
}
