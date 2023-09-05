<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

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