<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\EvaluatedApplicantController;
use App\Http\Controllers\PendingApplicantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['role:admin|program_head|mancom|registrar_staff'])->group(function () {
    Route::get('/applicants/pending-list', [PendingApplicantController::class, 'index'])->name('applicants.pending-list');
    Route::get('/applicants/evaluated-list', [EvaluatedApplicantController::class, 'index'])->name('applicants.evaluated-list');

    // Route::get('/applicants/create', [ApplicantController::class, 'create'])->name('applicants.create');
    // Route::post('/applicants', [ApplicantController::class, 'store'])->name('applicants.store');

    // Route::get('applicants/{staff}/edit', [ApplicantController::class, 'edit'])->name('applicants.edit');
    // Route::put('applicants/{staff}', [ApplicantController::class, 'update'])->name('applicants.update');
});
