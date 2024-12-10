<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerPing;

Route::get("/",[ControllerPing::class, 'index']);
Route::get("/ping/{id}",[ControllerPing::class, 'ping']);
Route::post("/reporte",[ControllerPing::class, 'reporte']);
