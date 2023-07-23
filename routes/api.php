<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\LoteController;

use App\Http\Middleware\Autenticacion;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) 
{
    return $request->Usuario();
});

Route::prefix('v1')->group(function ()
{
    Route::post('/IniciarSesion',
        [LoginController::class, "IniciarSesion"]
    );

    Route::post('/Usuarios/Crear',
        [UsuarioController::class, "ValidarRegistro"]
    );

    Route::put("/Backoffice/Usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Modificar"]
    );

    Route::delete("/Backoffice/Usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Eliminar"]
    );

    Route::get('/Backoffice/Usuarios/Listar',
        [UsuarioController::class, "Listar"]
    );

    Route::post('/Backoffice/Almacenes',
        [AlmacenController::class, "Crear"]
    );

    Route::put('/Backoffice/Almacenes/{idAlmacen}',
        [AlmacenController::class, "Modificar"]
    );

    Route::delete('/Backoffice/Almacenes/{idAlmacen}',
        [AlmacenController::class, "Eliminar"]
    );

    Route::post('/Backoffice/Articulos',
        [ArticuloController::class, "CrearArticulo"]
    );

    Route::post('Almacenes/Paquetes',
        [PaqueteController::class, "CrearPaquete"]
    );

    Route::put('/Almacenes/Paquetes/{idPaquete}',
        [PaqueteController::class,"AsignarPeso"]
    );
    
    Route::post('Almacenes/Lotes',
        [LoteController::class, "CrearLote"]
    );
    
    Route::put('/Almacenes/Articulos/{idArticulo}',
        [ArticuloController::class, "ModificarArticulo"]
    );

    Route::delete('/Almacenes/Articulos/{idArticulo}',
        [ArticuloController::class, "EliminarArticulo"]
    );
});