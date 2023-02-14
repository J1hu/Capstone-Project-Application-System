<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'role:admin')->group(function () {
    // Route::get('/applicants', [AdminController::class, 'test'])->name('users.index');
});
