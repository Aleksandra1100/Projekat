<?php

use App\Http\Controllers\ArrangementController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth','role:editor'])->group(function(){

    Route::get('arrangements',[ArrangementController::class,'index'])->name('arrangement.index');
    Route::post('arrangements', [ReservationController::class, 'store'])->name('arrangement.store');
    Route::get('arrangements/{id}',[ArrangementController::class, 'show'])->name('arrangements.show');
    Route::delete('arrangements/{id}',[ArrangementController::class, 'destroy'])->name('arrangements.destroy');
    Route::get('arrangements/edit/{id}',[ArrangementController::class, 'edit'])->name('arrangements.edit');
    Route::put('arrangements/{id}',[ArrangementController::class,'update'])->name('arrangement.update');
  
    Route::get('reservations',[ReservationController::class,'index'])->name('arrangement.index');
    Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::delete('reservations/{id}',[ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('arrangements/edit/{id}',[ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('arrangements/{id}',[ReservationController::class,'update'])->name('reservations.update');


    });
    