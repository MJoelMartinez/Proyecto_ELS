<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Articulo;
use App\Models\Articulo_tipoArticulo;

class ArticuloTest extends TestCase
{
    public function test_CrearUnArticulo()
    {
        $datosAInsertar = [
            "nombre" => "Articulo1",
            "anioCreacion" => "2005",
            "tipo" => "A"
        ];

        $response = $this->post('/api/v2/articulos', $datosAInsertar);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Articulo registrado correctamente."
        ]);

        $this->delete('/api/v2/articulos/2');
    }

    public function test_CrearUnArticuloConDatosErroneos()
    {
        $datosAInsertar = [
            "nombre" => "A",
            "anioCreacion" => "EstoNoEsUnAnio",
            "tipo" => "tipoInvalido"
        ];

        $response = $this->post('/api/v2/articulos', $datosAInsertar);
        $response->assertStatus(401);
    }

    public function test_CrearUnArticuloSinDatos()
    {
        $response = $this->post('/api/v2/articulos');
        $response->assertStatus(401);
    }

    public function test_ModificarUnArticuloQueExiste()
    {
        $datosAInsertar = [
            "nombre" => "NuevoArticulo1"
        ];

        $response = $this->post('/api/v2/articulos/1', $datosAInsertar);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Articulo modificado correctamente."
        ]);
    }

    public function test_ModificarUnArticuloQueNoExiste()
    {
        $datosAInsertar = [
            "nombre" => "NuevoArticulo9999"
        ];

        $response = $this->post('/api/v2/articulos/9999', $datosAInsertar);
        $response->assertStatus(405);
    }

    public function test_EliminarUnArticuloQueExiste()
    {
        $response = $this->delete('/api/v2/articulos/1');
        $response->assertJsonFragment([
            "mensaje" => "Articulo eliminado correctamente."
        ]);
        $this->assertDatabaseMissing("articulos",[
            "idArticulo" => 1,
            "deleted_at" => null
        ]);
        Articulo::withTrashed()->where("idArticulo", 1)->restore();
        Articulo_tipoArticulo::withTrashed()->where("idArticulo", 1)->restore();

        $response->assertStatus(200); 
    }

    public function test_EliminarUnArticuloQueNoExiste()
    {
        $response = $this->delete('/api/v2/articulos/9999');
        $response->assertStatus(404);
    }
}
