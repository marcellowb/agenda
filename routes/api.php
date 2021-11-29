<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('estado', \App\Http\Controllers\EstadoController::class)->only('index');
Route::apiResource('contato', \App\Http\Controllers\ContatoController::class);
