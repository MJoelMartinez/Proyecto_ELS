<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function ()
{
    Route::post('/Usuarios/Crear',
        [UsuarioController::class, "ValidarRegistro"]
    );

    Route::put("/Usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Modificar"]
    );

    Route::delete("/Usuarios/{documentoDeIdentidad}",
        [UsuarioController::class, "Eliminar"]
    );
});