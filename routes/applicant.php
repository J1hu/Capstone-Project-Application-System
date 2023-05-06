<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\EvaluatedApplicantController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\PendingApplicantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin|program_head|mancom|registrar_staff', 'verified'])->group(function () {
    Route::get('/applicants/pending-list', [PendingApplicantController::class, 'index'])->name('applicants.pending-list');
    Route::get('/applicants/evaluated-list', [EvaluatedApplicantController::class, 'index'])->name('applicants.evaluated-list');

    Route::get('/applicants/{id}/profile', [ApplicantController::class, 'viewProfileById'])->name('applicants.admin-view');

    Route::post('/preassessments', [EvaluationController::class, 'preassessment'])->name('preassessments.store');
    Route::post('/exam-scores', [EvaluationController::class, 'examScore'])->name('exam_scores.store');
    Route::post('/initial_assessments', [EvaluationController::class, 'initialAssessment'])->name('initial_assessments.store');
    Route::post('/final_assessments', [EvaluationController::class, 'finalAssessment'])->name('final_assessments.store');

    // Route::get('/applicants/create', [ApplicantController::class, 'create'])->name('applicants.create');
    // Route::post('/applicants', [ApplicantController::class, 'store'])->name('applicants.store');

    // Route::get('applicants/{staff}/edit', [ApplicantController::class, 'edit'])->name('applicants.edit');
    // Route::put('applicants/{staff}', [ApplicantController::class, 'update'])->name('applicants.update');
});
