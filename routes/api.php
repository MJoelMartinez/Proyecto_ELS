<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Autenticacion;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->Usuario();
});

Route::prefix('v1')->group(function ()
{
    Route::post('/Usuarios/Crear',
        [UsuarioController::class, "ValidarRegistro"]
    );

    Route::get('/Validar',
        [UsuarioController::class,"ValidarToken"]) -> middleware('auth:api')
    ;
    
    Route::get('/CerrarSesion',
        [UsuarioController::class,"CerrarSesion"]) -> middleware('auth:api')
    ;

    Route::post('/Almacenes/Paquetes/Crear',
        [AlmacenController::class,"CrearPaquetes"]    
    );

    Route::post('/Almacenes/Paquetes/Lotes',
        [AlmacenController::class,"CrearLote"]
    );

    Route::put('/Almacenes/Paquetes/Peso/{idPaquete}',
        [AlmacenController::class,"AsignarPesoDePaquete"]
    );

    Route::post('/IniciarSesion',
        [LoginController::class, "IniciarSesion"]
    );
});