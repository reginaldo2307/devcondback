<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\DocController;
use App\Http\Controllers\FoundAndLostController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WallController;
use App\Http\Controllers\WarningController;


Route::get('/ping', function() {
    return ['pong'=>true];
});

Route::get('/401', [AuthController::class, 'unauthorized'])->name('login');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:api')->group(function(){
    Route::post('/auth/validate', [AuthController::class, 'validateToken']);
    Route::get('/auth/logout', [AuthController::class, 'logout']);

    //Mural de Avisos
    Route::get('/walls', [AuthController::class, 'getAll']);
    Route::post('/wall/{id}/like', [AuthController::class, 'like']);

    //Documentos
    Route::get('/docs', [AuthController::class, 'getAll']);

    //Livro de Ocorrências
    Route::get('/warnings', [AuthController::class, 'getMyWarnings']);
    Route::post('/warning', [AuthController::class, 'setWarning']);
    Route::post('/warning/file', [AuthController::class, 'addWarningFile']);

    //Boletos
    Route::get('/billets', [AuthController::class, 'getAll']);

    //Achados e Perdidos
    Route::get('/foundandlost', [AuthController::class, 'getAll']);
    Route::post('/foundandlost', [AuthController::class, 'insert']);
    Route::put('/foundandlost/{id}', [AuthController::class, 'update']);

    //Unidades
    Route::get('/unit/{id}', [AuthController::class, 'getInfo']);
    Route::post('/unit/{id}/addperson', [AuthController::class, 'addPerson']);
    Route::post('/unit/{id}/addvehicle', [AuthController::class, 'addVehicle']);
    Route::post('/unit/{id}/addpet', [AuthController::class, 'addPet']);
    Route::post('/unit/{id}/removeperson', [AuthController::class, 'removePerson']);
    Route::post('/unit/{id}/removevehicle', [AuthController::class, 'removeVehicle']);
    Route::post('/unit/{id}/removepet', [AuthController::class, 'removePet']);

    //Reservas
    Route::get('/reservations', [AuthController::class, 'getReservations']);
    Route::post('/reservation/{id}', [AuthController::class, 'setReservation']);
    Route::get('/reservation/{id}/disableddates', [AuthController::class, 'getDisabledDates']);    
    Route::get('//reservation/{id}/times', [AuthController::class, 'getTimes']);
    Route::get('/myreservations', [AuthController::class, 'getMyReservations']);
    Route::delete('/myreservation/{id}', [AuthController::class, 'delMyReservation']);
});


