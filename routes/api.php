<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\TipoArticuloController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function ()
{
    Route::post('/usuarios/crear',
        [UsuarioController::class, "ValidarRegistro"]
    );

    Route::put("/usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Modificar"]
    );

    Route::delete("/usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Eliminar"]
    );

    Route::post('/usuarios/buscar',
        [UsuarioController::class, "Buscar"]
    );

});

Route::prefix('v2')->group(function ()
{
    Route::post('/usuarios',
        [UsuarioController::class, "ValidarRegistro"]
    );

    Route::put("/usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Modificar"]
    );

    Route::delete("/usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Eliminar"]
    );

    Route::post('/usuarios/buscar',
        [UsuarioController::class, "Buscar"]
    );

    Route::post('/vehiculos',
        [VehiculoController::class, "ValidarRegistro"]
    );

    Route::put("/vehiculos/{matricula}",
        [VehiculoController::class, "Modificar"]
    );

    Route::delete("/vehiculos/{matricula}",
        [VehiculoController::class, "Eliminar"]
    );

    Route::put("/asignarVehiculo/{documentoDeIdentidad}",
        [VehiculoController::class, "AsignarChofer"]
    );

    Route::delete("/relegarVehiculo/{documentoDeIdentidad}",
        [VehiculoController::class, "RelegarChofer"]
    );

    Route::post('/modelos',
        [ModeloController::class, "ValidarRegistro"]
    );

    Route::put('/modelos/{idModelo}',
        [ModeloController::class, "Modificar"]
    );

    Route::delete('/modelos/{idModelo}',
        [ModeloController::class, "Eliminar"]
    );

    Route::post('/almacenes',
        [AlmacenController::class, "Crear"]
    );

    Route::put('/almacenes/{idAlmacen}',
        [AlmacenController::class, "Modificar"]
    );

    Route::delete('/almacenes/{idAlmacen}',
        [AlmacenController::class, "Eliminar"]
    );

    Route::put('/almacenes/asignar/{idAlmacen}/{documentoDeIdentidad}',
        [AlmacenController::class, "AsignarEmpleado"]
    );

    Route::delete('/almacenes/relegar/{documentoDeIdentidad}',
        [AlmacenController::class, "RelegarEmpleado"]
    );

    Route::post('/articulos',
        [ArticuloController::class, "Crear"]
    );

    Route::put('/articulos/{idArticulo}',
        [ArticuloController::class, "Modificar"]
    );

    Route::delete('/articulos/{idArticulo}',
        [ArticuloController::class, "Eliminar"]
    );

    Route::post('/turnos',
        [TurnoController::class, "Crear"]
    );

    Route::delete('/turnos/{idTurno}',
        [TurnoController::class, "Eliminar"]
    );

    Route::post('/tipoArticulo',
        [TipoArticuloController::class, "Crear"]
    );
});