<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('backoffice');
});

Route::get('/usuarios', function () 
{
    return view('usuarios');
});

Route::get('/vehiculos', function () 
{
    return view('vehiculos');
});

Route::get('/modelos', function () 
{
    return view('modelos');
});

Route::get('/almacenes', function () 
{
    return view('almacenes');
});

Route::get('/articulos', function () 
{
    return view('articulos');
});

Route::get('/turnos', function () 
{
    return view('turnos');
});

Route::get('/tipoArticulo', function () 
{
    return view('tipoArticulo');
});

Route::get('/listadoVehiculo', function () 
{
    return view('listadoVehiculo');
});