<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf', [ReporteController::class, 'generatePDF']);