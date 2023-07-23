<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\LoteController;

Route::get('/', function () 
{
    return view('homepage');
});

Route::get('/Backoffice', function () 
{
    return view('backoffice');
});

Route::get('/Backoffice/Usuarios', function () 
{
    return view('usuarios');
});

Route::get('/Backoffice/Almacenes', function () 
{
    return view('almacenes');
});

Route::get('/AppAlmacenes', function () 
{
    return view('appalmacenes');
});

Route::get('/AppAlmacenes/Paquetes', function () 
{
    return view('paquetes');
});

Route::get('/AppAlmacenes/Lotes', function () 
{
    return view('lotes');
});
