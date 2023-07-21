<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\LoteController;

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

Route::get('/AppAlmacenes', function () {
    return view('appalmacenes');
});

Route::get('/AppAlmacenes/paquetes', function () {
    return view('paquetes');
});

Route::get('/AppAlmacenes/lotes', function () {
    return view('lotes');
});
