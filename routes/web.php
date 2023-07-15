<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
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

Route::post('/Backoffice/Usuarios/Crear',
    [UsuarioController::class, "Crear"]
);

Route::put("/Backoffice/Usuarios/Modificar/{documentoDeIdentidad}",
    [UsuarioController::class, "Modificar"]
);

Route::delete("/Backoffice/Usuarios/Eliminar/{documentoDeIdentidad}",
    [UsuarioController::class, "Eliminar"]
);

Route::delete('/Backoffice/Almacenes/Eliminar/{idAlmacen}',
    [AlmacenController::class, "Eliminar"]
);

Route::post('/Backoffice/Almacenes/Crear',
    [AlmacenController::class, "Crear"]
);