<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('backoffice');
});

Route::get('/Usuarios', function () 
{
    return view('usuarios');
});
