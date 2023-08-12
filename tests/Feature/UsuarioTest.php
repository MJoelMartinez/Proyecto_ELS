<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

use App\Models\Usuario;

class UsuarioTest extends TestCase
{
    public function test_EliminarUnoQueNoExiste()
    {
        $response = $this->delete('/api/v1/Backoffice/Usuarios/62562818');
        $response->assertStatus(404); 
    }
    
    public function test_EliminarUnoQueExiste()
    {
        $response = $this->delete('/api/v1/Backoffice/Usuarios/77777777');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El Usuario con la cedula 77777777 ha sido eliminado."
        ]);
        $this->assertDatabaseMissing("usuarios",[
            "docDeIdentidad" => 77777777,
            "deleted_at" => null
        ]);

        Usuario::withTrashed()->where("docDeIdentidad", 77777777)->restore();
    }

    public function test_ModificarUnoQueNoExiste()
    {
        $datosAInsertar = [
            "nombre" => "Casper",
            "telefono" => "094404404",
            "direccion" => "Av. 404"
        ];

        $response = $this->put('/api/v1/Backoffice/Usuarios/62562818', $datosAInsertar);
        $response->assertStatus(404); 
    }

    public function test_ModificarUnoQueExiste()
    {
        $datosAInsertar = [
            "nombre" => "Pepito",
            "telefono" => "097777777",
            "direccion" => "Av. Pepito"
        ];

        $response = $this->put('/api/v1/Backoffice/Usuarios/77777777', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El Usuario con la cedula 77777777 ha sido modificado."
        ]);
    }

    public function test_InsertarSinNada()
    {
        $response = $this->post('/api/v1/Usuarios/Crear');
        $response->assertStatus(403); 
    }

    public function test_Insertar()
    {
        $datosAInsertar = [
            "documentoDeIdentidad" => "77777770",
            "nombre" => "Cristiano",
            "apellido" => "Ronaldo",
            "contrasenia" => "eurocopa2016",
            "contrasenia_confirmation" => "eurocopa2016",
            "telefono" => "777777777",
            "direccion" => "cincoBalonDeOro 2017",
            "email" => "CRonaldo7@gmail.com"
        ];

        $response = $this->post('/api/v1/Usuarios/Crear', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        Usuario::where("docDeIdentidad", 77777770)->delete();
    }

    public function test_InsertarAdministrador()
    {
        $datosAInsertar = [
            "documentoDeIdentidad" => "46520333",
            "nombre" => "Alva",
            "apellido" => "Alegre",
            "contrasenia" => "Admin2023",
            "contrasenia_confirmation" => "Admin2023",
            "telefono" => "096754320",
            "direccion" => "Aparicio Saravia 1012",
            "email" => "BestAdmin23@gmail.com",
            "rolDeLaEmpresa" => "administrador",
            "numeroDeRol" => "1"
        ];

        $response = $this->post('/api/v1/Usuarios/Crear', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        Usuario::where("docDeIdentidad", 46520333)->delete();
    }

    public function test_InsertarGerente()
    {
        $datosAInsertar = [
            "documentoDeIdentidad" => "49098644",
            "nombre" => "Geremias",
            "apellido" => "Gonzalez",
            "contrasenia" => "Gerente2023",
            "contrasenia_confirmation" => "Gerente2023",
            "telefono" => "096754123",
            "direccion" => "Gaboto 1021",
            "email" => "BestGerente23@gmail.com",
            "rolDeLaEmpresa" => "gerente",
            "numeroDeRol" => "1"
        ];

        $response = $this->post('/api/v1/Usuarios/Crear', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        Usuario::where("docDeIdentidad", 49098644)->delete();
    }

    public function test_InsertarCargador()
    {
        $datosAInsertar = [
            "documentoDeIdentidad" => "40659854",
            "nombre" => "Carlos",
            "apellido" => "Colon",
            "contrasenia" => "Cargador2023",
            "contrasenia_confirmation" => "Cargador2023",
            "telefono" => "097854123",
            "direccion" => "Camino Maldonado 1021",
            "email" => "BestCargador23@gmail.com",
            "rolDeLaEmpresa" => "cargador",
            "numeroDeRol" => "1",
            "carnetTransporte" => "8013124"
        ];

        $response = $this->post('/api/v1/Usuarios/Crear', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        Usuario::where("docDeIdentidad", 40659854)->delete();
    }

    public function test_InsertarChofer()
    {
        $datosAInsertar = [
            "documentoDeIdentidad" => "40659855",
            "nombre" => "Carmen",
            "apellido" => "Colon",
            "contrasenia" => "Chofer2023",
            "contrasenia_confirmation" => "Chofer2023",
            "telefono" => "097854124",
            "direccion" => "Camino Maldonado 1021",
            "email" => "BestChofer23@gmail.com",
            "rolDeLaEmpresa" => "chofer",
            "numeroDeRol" => "1"
        ];

        $response = $this->post('/api/v1/Usuarios/Crear', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        Usuario::where("docDeIdentidad", 40659855)->delete();
    }
}