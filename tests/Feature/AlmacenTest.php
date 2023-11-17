<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Almacen;

class AlmacenTest extends TestCase
{
    public function test_InsertarUnAlmacen()
    {
        $datosAInsertar = [
            "capacidad" => "1000",
            "direccion" => "test 200",
            "idDepartamento" => "1"
        ];

        $response = $this->post('almacenes', $datosAInsertar);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El almacen fue registrado con exito."
        ]);
    }

    public function test_InsertarUnAlmacenSinMandarDatos()
    {
        $response = $this->post('/almacenes');
        $response->assertStatus(401); 
    }

    public function test_InsertarUnAlmacenConDatosErroneos()
    {
        $datosAInsertar = [
            "capacidad" => "capacidadInvalida",
            "direccion" => "DireccionLargaQueSupereLosCuarentaCaracteres",
            "idDepartamento" => "IDInvalido"
        ];

        $response = $this->post('/almacenes', $datosAInsertar);
        $response->assertStatus(401);
    }

    public function test_ModificarUnAlmacenQueExiste()
    {
        $datosAInsertar = [
            "idAlmacen" => "1",
            "capacidad" => "700",
            "direccion" => "Direccion Prueba"
        ];
        $response = $this->put('/almacenes/1', $datosAInsertar);
        $response->assertJsonFragment([
            "mensaje" => "El almacen fue modificado con exito."
        ]);
        $response->assertStatus(200);
    }

    public function test_ModificarUnAlmacenQueNoExiste()
    {
        $datosAInsertar = [
            "idAlmacen" => "9999",
            "capacidad" => "700",
            "direccion" => "Direccion Prueba"
        ];
        $response = $this->put('/almacenes/9999', $datosAInsertar);
        $response->assertStatus(404);
    }

    public function test_EliminarUnAlmacenQueExiste()
    {
        $response = $this->delete('/almacenes/1');
        $response->assertJsonFragment([
            "mensaje" => "El almacen fue eliminado con exito."
        ]);
        $this->assertDatabaseMissing("almacenes",[
            "idAlmacen" => 1,
            "deleted_at" => null
        ]);
        $response->assertStatus(200); 
    }

    public function test_EliminarUnAlmacenQueNoExiste()
    {
        $response = $this->delete('/almacenes/9999');
        $response->assertStatus(404); 
    }

    public function test_AsignarUnEmpleadoExistente()
    {
        $response = $this->put('/almacenes/asignar/1/77777777');
        $response->assertJsonFragment([
            "mensaje" => "Funcionario asignado con exito."
        ]);
        $response->assertStatus(200); 
    }

    public function test_AsignarUnEmpleadoQueNoExiste()
    {
        $response = $this->put('/almacenes/asignar/1/99999999');
        $response->assertJsonFragment([
            "mensaje" => "No se han encontrado funcionarios con esa CI."
        ]);
        $response->assertStatus(404); 
    }

    public function test_RelegarUnEmpleadoExistente()
    {
        $response = $this->delete('/almacenes/relegar/7777777');
        $response->assertJsonFragment([
            "mensaje" => "Funcionario relegado con exito."
        ]);
        $response->assertStatus(200); 
    }

    public function test_RelegarUnEmpleadoQueNoExiste()
    {
        $response = $this->delete('/almacenes/relegar/99999999');
        $response->assertJsonFragment([
            "mensaje" => "No se han encontrado funcionarios con esa CI."
        ]);
        $response->assertStatus(404); 
    }
}
