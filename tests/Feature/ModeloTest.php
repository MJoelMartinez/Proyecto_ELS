<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Modelo;

class ModeloTest extends TestCase
{
    public function test_CrearUnModelo()
    {
        $datosAInsertar = [
            "nombre" => "Modelo2",
            "anio" => "2005"
        ];

        $response = $this->post('/api/v2/modelos', $datosAInsertar);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El modelo fue creado con exito."
        ]);

        $this->delete('/api/v2/modelos/2');
    }

    public function test_CrearUnModeloConDatosErroneos()
    {
        $datosAInsertar = [
            "nombre" => "M",
            "anio" => "EstoNoEsUnAnio"
        ];

        $response = $this->post('/api/v2/modelos', $datosAInsertar);
        $response->assertStatus(401);
    }

    public function test_CrearUnModeloSinDatos()
    {
        $response = $this->post('/api/v2/modelos');
        $response->assertStatus(401);
    }

    public function test_ModificarUnModeloQueExiste()
    {
        $datosAInsertar = [
            "nombre" => "Modelo1.5",
            "anio" => "2006"
        ];

        $response = $this->post('/api/v2/modelos/1', $datosAInsertar);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El modelo con el ID 1 fue modificado con exito."
        ]);
    }

    public function test_ModificarUnModeloQueNoExiste()
    {
        $datosAInsertar = [
            "nombre" => "Modelo1.5",
            "anio" => "2006"
        ];

        $response = $this->post('/api/v2/modelos/9999', $datosAInsertar);
        $response->assertStatus(405);
    }

    public function test_EliminarUnModeloQueExiste()
    {
        $response = $this->delete('/api/v2/modelos/1');
        $response->assertJsonFragment([
            "mensaje" => "El modelo con el ID 1 fue eliminado con exito."
        ]);
        $this->assertDatabaseMissing("modelos",[
            "idModelo" => 1,
            "deleted_at" => null
        ]);
        Modelo::withTrashed()->where("idModelo", 1)->restore();

        $response->assertStatus(200); 
    }

    public function test_EliminarUnModeloQueNoExiste()
    {
        $response = $this->delete('/api/v2/modelos/9999');
        $response->assertStatus(404);
    }
}
