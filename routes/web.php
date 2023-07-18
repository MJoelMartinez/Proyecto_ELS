<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/Login', function () {
    return view('login');
});

Route::get('/Backoffice', function () {
    return view('backoffice');
});

Route::get('/Backoffice/Usuarios', function () {
    return view('usuarios');
});

Route::get('/Backoffice/Almacenes', function () {
    return view('almacenes');
});

Route::put("/Backoffice/Usuarios/Modificar/{documentoDeIdentidad}",
    [UsuarioController::class, "Modificar"]
);

Route::delete("/Backoffice/Usuarios/Eliminar/{documentoDeIdentidad}",
    [UsuarioController::class, "Eliminar"]
);

Route::post('/Backoffice/Almacenes/Crear',
    [AlmacenController::class, "Crear"]
);

Route::put('/Backoffice/Almacenes/Modificar/{idAlmacen}',
    [AlmacenController::class, "Modificar"]
);

Route::delete('/Backoffice/Almacenes/Eliminar/{idAlmacen}',
    [AlmacenController::class, "Eliminar"]
);

Route::get('/AppAlmacenes', function () {
    return view('appalmacenes');
});

Route::get('/AppAlmacenes/paquetes', function () {
    return view('paquetes');
});

Route::post('Almacenes/Paquetes/Crear',
    [AlmacenController::class, "CrearPaquete"]
);

Route::get('/AppAlmacenes/lotes', function () {
    return view('lotes');
});

Route::post('/Almacenes/Lotes/CrearLote', 
    [AlmacenController::class, "CrearLote"]
);

Route::put('/Almacenes/Paquetes/Modificar', 
    [AlmacenController::class, "AsignarPesoDePaquete"]
);