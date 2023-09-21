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
