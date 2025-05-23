<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



// Route::middleware(['web', 'adminAuthApi'])->group(function () {
    Route::post('/list', [DataController::class, 'list']);
    Route::post('/create', [DataController::class, 'create']);
    Route::post('/update', [DataController::class, 'update']);

// });
