<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerPing;

Route::get("/",[ControllerPing::class, 'index']);
Route::post("/reporte",[ControllerPing::class, 'reporte']);
