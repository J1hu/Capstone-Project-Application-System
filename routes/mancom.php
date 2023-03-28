<?php

use App\Http\Controllers\MancomController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin'])->group(function () {
    Route::get('/mancoms/list', [MancomController::class, 'index'])->name('mancoms.list');

    Route::get('/mancoms/create', [MancomController::class, 'create'])->name('mancoms.create');
    Route::post('/mancoms', [MancomController::class, 'store'])->name('mancoms.store');

    Route::get('mancoms/{mancom}/edit', [MancomController::class, 'edit'])->name('mancoms.edit');
    Route::put('mancoms/{mancom}', [MancomController::class, 'update'])->name('mancoms.update');
});
