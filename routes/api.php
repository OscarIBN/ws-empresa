<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\enterpriseController;

Route::get('/enterprises', [enterpriseController::class, 'readAll']);

Route::get('/enterprises/{nit}', [enterpriseController::class, 'readOne']);

Route::post('/enterprises', [enterpriseController::class, 'create']);

Route::put('/enterprises/{nit}', [enterpriseController::class, 'update']);

Route::delete('/enterprises/{nit}', [enterpriseController::class, 'destroy']);