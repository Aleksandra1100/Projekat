<?php

use App\Http\Controllers\ArrangementController;
use App\Http\Controllers\ReservationController;
use App\Http\Middleware;
use Spatie\Permission\Middlewares\RoleMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth','role:user'])->group(function(){
Route::get('arrangements',[ArrangementController::class,'index'])->name('arrangement.index');
Route::get('arrangements/{id}',[ArrangementController::class, 'show'])->name('arrangements.show');
Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('reservations/{id}', [ReservationController::class, 'show'])->name('reservations.show');
Route::get('reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
});

