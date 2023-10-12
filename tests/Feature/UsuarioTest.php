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
        $response = $this->delete('/api/v2/usuarios/99999999');
        $response->assertStatus(404); 
    }
    
    public function test_EliminarUnoQueExiste()
    {
        $response = $this->delete('/api/v2/usuarios/12345670');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El Usuario con la cedula 12345670 ha sido eliminado."
        ]);
        $this->assertDatabaseMissing("usuarios",[
            "docDeIdentidad" => 12345670,
            "deleted_at" => null
        ]);

        Usuario::withTrashed()->where("docDeIdentidad", 12345670)->restore();
    }

    public function test_ModificarUnoQueNoExiste()
    {
        $datosAInsertar = [
            "nombre" => "Casper",
            "telefono" => "094404404",
            "direccion" => "Av. 404"
        ];

        $response = $this->put('/api/v2/usuarios/99999999', $datosAInsertar);
        $response->assertStatus(404); 
    }


    public function test_ModificarUnoQueExiste()
    {
        $datosAInsertar = [
            "nombre" => "Pepito",
            "telefono" => "097777777",
            "direccion" => "Av. Pepito"
        ];

        $response = $this->put('/api/v2/usuarios/12345678', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "El Usuario con la cedula 12345678 ha sido modificado."
        ]);
    }

    public function test_InsertarUsuarioSinInformacion()
    {
        $response = $this->post('/api/v2/usuarios/');
        $response->assertStatus(401); 
    }

    public function test_InsertarUsuarioConDatosErroneos()
    {
        $datosAInsertar = [
            "documentoDeIdentidad" => "77777775",
            "nombre" => "Cristiano",
            "apellido" => "R",
            "contrasenia" => "peque",
            "contrasenia_confirmation" => "peque",
            "telefono" => "TelefonoInvalido",
            "direccion" => "DireccionLargaQueSupereLosCuarentaCaracteres",
            "email" => "CRonaldo7@gmail.com"
        ];

        $response = $this->put('/api/v2/usuarios', $datosAInsertar);
        $response->assertStatus(401); 
    }

    public function test_InsertarUsuarioComun()
    {
        $datosAInsertar = [
            "documentoDeIdentidad" => "77777775",
            "nombre" => "Cristiano",
            "apellido" => "Ronaldo",
            "contrasenia" => "eurocopa2016",
            "contrasenia_confirmation" => "eurocopa2016",
            "telefono" => "777777777",
            "direccion" => "ArabiaSaudita 777",
            "email" => "CRonaldo7@gmail.com"
        ];

        $response = $this->post('/api/v2/usuarios', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        $this->delete('/api/v2/usuarios/77777775');
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
            "rolDeLaEmpresa" => "administrador"
        ];

        $response = $this->post('/api/v2/usuarios', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        $this->delete('/api/v2/usuarios/46520333');
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
            "idAlmacen" => "1",
            "idTurno" => "1"
        ];

        $response = $this->post('/api/v2/usuarios', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        $this->delete('/api/v2/usuarios/49098644');
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
            "carnetTransporte" => "8013124",
            "idAlmacen" => "1",
            "idTurno" => "1"
        ];

        $response = $this->post('/api/v2/usuarios', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        $this->delete('/api/v2/usuarios/40659854');
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
            "idLicencia" => "40659855",
            "diaDesde" => "10",
            "mesDesde" => "2",
            "anioDesde" => "2004",
            "diaHasta" => "25",
            "mesHasta" => "9",
            "anioHasta" => "2025"
        ];

        $response = $this->post('/api/v2/usuarios/', $datosAInsertar);

        $response->assertStatus(200);
        $response->assertJsonFragment([
            "mensaje" => "Usuario creado correctamente."
        ]);

        $this->delete('/api/v2/usuarios/40659855');
    }
}