<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware(['role:admin', 'verified'])->group(function () {
    Route::get('/evaluators/list', [UserController::class, 'index'])->name('evaluators.list');

    Route::get('/evaluators/create', [UserController::class, 'create'])->name('evaluators.create');
    Route::post('/evaluators', [UserController::class, 'store'])->name('evaluators.store');

    Route::get('evaluators/{evaluator}/edit', [UserController::class, 'edit'])->name('evaluators.edit');
    Route::put('evaluators/{evaluator}', [UserController::class, 'update'])->name('evaluators.update');
});
