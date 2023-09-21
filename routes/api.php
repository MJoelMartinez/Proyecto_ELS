<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ModeloController;

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

});