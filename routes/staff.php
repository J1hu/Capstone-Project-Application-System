<?php

use App\Http\Controllers\RegistrarStaffController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin', 'verified'])->group(function () {
    Route::get('/staffs/list', [RegistrarStaffController::class, 'index'])->name('staffs.list');

    Route::get('/staffs/create', [RegistrarStaffController::class, 'create'])->name('staffs.create');
    Route::post('/staffs', [RegistrarStaffController::class, 'store'])->name('staffs.store');

    Route::get('staffs/{staff}/edit', [RegistrarStaffController::class, 'edit'])->name('staffs.edit');
    Route::put('staffs/{staff}', [RegistrarStaffController::class, 'update'])->name('staffs.update');
});
