<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Http;

class ExampleTest extends TestCase
{

    public function test_EliminarUnoQueNoExiste()
    {
        $response = $this->delete('/api/v1/Backoffice/Usuarios/62562818');
        $response -> assertStatus(404); 
    }
    
    public function test_EliminarUnoQueExiste()
    {
        $response = $this->delete('/api/v1/Backoffice/Usuarios/47809330');
        $response->assertStatus(200);
        $response->assertJsonFragment([ "mensaje" => "Usuario con el documento de identidad 47809330 eliminada."]); // Valida que la estructura de JSON tenga los campos especificados en el array
        $this->assertDatabaseMissing("usuarios",[
            "docDeIdentidad" => 47809330,
            "deleted_at" => null
        ]);

        Usuarios::withTrashed()->where("docDeIdentidad", 47809330)->restore();
    }

    public function test_ModificarUnoQueExiste(){
        $estructura = [
            "docDeIdentidad",
            "nombre",
            "contrasenia",
            "remember_token",
            "created_at",
            "updated_at",
            "apellido",
            "telefono",
            "direccion",
            "delete_at",
            "email"
        ];

        $datosParaModificar = [
            "nombre" => "Nombre",
            "telefono" => "095080095",
            "direccion" => "Direccion"
        ];

        $response = $this -> put('/api/v1/Backoffice/Usuarios/54738269', $datosParaModificar);

        $response->assertStatus(200);
        $response->assertJsonStructure($estructura); 
        $response->assertJsonFragment([
            "nombre" => "Lionel",
            "telefono" => "091101010",
            "direccion" => "campeonDelMundo 2022"
        ]);
    }

    public function test_InsertarSinNada(){
        $response = $this->post('/api/v1/Usuarios/Crear');
        $response->assertStatus(403); 
    }

    public function test_Insertar(){
        $estructura = [
            "docDeIdentidad",
            "nombre",
            "apellido",
            "contrasenia",
            "remember_token",
            "created_at",
            "updated_at",
            "telefono",
            "direccion",
            "email"
        ];

        $datosParaInsertar = [
            "docDeIdentidad" => "38762316",
            "nombre" => "Cristiano",
            "apellido" => "Ronaldo",
            "contrasenia" => "eurocopa2016",
            "remember_token" => null,
            "created_at" => "2023-06-10 17:12:41",
            "updated_at" => "2023-06-10 17:12:41",
            "telefono" => "777777777",
            "direccion" => "cincoBalonDiOr 2017",
            "email" => "fubito@pro.com"
        ];

        $response = $this->post('http://localhost:8001/api/v1/Usuarios/Crear', $datosParaInsertar);

        $response->assertStatus(200);
    }

    public function test_InsertarAdministrador(){
        $estructura = [
            "docDeIdentidad",
            "numeroAdmin"
        ];

        $datosParaInsertar = [
            "docDeIdentidad" => "65829230",
            "numeroAdmin" => "2"
        ];

        $response = $this->post('http://localhost:8001/api/v1//Usuarios/Crear', $datosParaInsertar);

        $response->assertStatus(200);
    }

    public function test_InsertarGerente(){
        $estructura = [
            "docDeIdentidad",
            "numeroGerente"
        ];

        $datosParaInsertar = [
            "docDeIdentidad" => "89098644",
            "numeroGerente" => "1"
        ];

        $response = $this->post('http://localhost:8001/api/v1/Usuarios/Crear', $datosParaInsertar);

        $response->assertStatus(200);
    }

    public function test_InsertarCargador(){
        $estructura = [
            "docDeIdentidad",
            "numeroCargador",
            "carnetTransporte"
        ];

        $datosParaInsertar = [
            "docDeIdentidad" => "47809330",
            "numeroCargador" => "5",
            "carnetTransporte" => "20"
        ];

        $response = $this->post('http://localhost:8001/api/v1/Usuarios/Crear', $datosParaInsertar);

        $response->assertStatus(200);
    }

    public function test_InsertarChofer(){
        $estructura = [
            "docDeIdentidad",
            "numeroChofer"
        ];

        $datosParaInsertar = [
            "docDeIdentidad" => "30070775",
            "numeroChofer" => "3"
        ];

        $response = $this->post('http://localhost:8001/api/v1/Usuarios/Crear', $datosParaInsertar);

        $response->assertStatus(200);
    }
}

