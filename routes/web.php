<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\SchoolYearController;
use App\Http\Controllers\StatusTableController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\VisualizationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/', function () {
    return view('welcome');
})->name('home');

//shortcut for returning a simple view
Route::view('/faqs', 'faqs')->name('faqs');
Route::view('/terms', 'terms')->name('terms');
Route::view('/privacy', 'privacy')->name('privacy');
Route::view('/test', 'testing')->name('test');

Route::get('/dashboard', function () {
    $user = Auth::user();

    // Check if the user has any of the specified roles
    $hasAllowedRole = $user->hasAnyRole(['admin', 'program_head', 'mancom', 'registrar_staff']);

    if ($hasAllowedRole) {
        return view('dashboard');
    }

    // Check if the user has applicant data
    $hasApplicantData = $user->applicant()->exists();

    if (!$hasApplicantData) {
        return redirect()->route('applicants.forms.form');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// APPLICANTS
Route::middleware(['auth', 'role:applicant', 'verified'])->group(function () {
    Route::prefix('applicants')->group(function () {
        Route::get('dashboard', [ApplicantController::class, 'index'])->name('applicants.dashboard');
        Route::get('form', [ApplicantController::class, 'viewForm'])->name('applicants.forms.form');
        Route::get('profile', [ApplicantController::class, 'viewProfile'])->name('applicants.profile');
        Route::post('store', [ApplicantController::class, 'store'])->name('applicants.store');
    });
});

// USERS
Route::middleware('auth')->group(function () {
    //
});

// ADMIN LOGIN
Route::get('admin/login', [AdminController::class, 'viewLogin'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:applicant|admin|program_head|mancom|registrar_staff', 'verified'])->group(function () {
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
});

// BATCH MANAGEMENT
Route::middleware(['auth', 'role:applicant|admin|program_head|mancom|registrar_staff', 'verified'])->group(function () {
    Route::get('/active-batches', [BatchController::class, 'showActiveBatches'])->name('batches.list');
    Route::get('/archived-batches', [BatchController::class, 'showArchivedBatches'])->name('batches.archived-list');
    Route::get('/batches/archive', [BatchController::class, 'archive'])->name('batches.archive');
    Route::get('/batches/unarchive', [BatchController::class, 'unarchive'])->name('batches.unarchive');
});

// CSV GENERATION
Route::middleware(['auth', 'role:applicant|admin|program_head|mancom|registrar_staff', 'verified'])->group(function () {
    Route::prefix('generate')->group(function () {
        Route::get('/evaluated-applicant-csv', [CsvController::class, 'generateEvaluatedApplicantsCSV'])->name('generate.one');
        Route::get('/pending-applicant-csv', [CsvController::class, 'generatePendingApplicantsCSV'])->name('generate.two');
        Route::get('/all-applicant-csv', [CsvController::class, 'generateAllApplicantsCSV'])->name('generate.three');
        Route::get('/failed-applicant-csv', [CsvController::class, 'generateFailedApplicantsCSV'])->name('generate.four');
    });
});

// NOTIFICATIONS
Route::middleware(['auth', 'role:applicant|admin|program_head|mancom|registrar_staff', 'verified'])->group(function () {
    Route::prefix('notifications')->group(function () {
        Route::get('/view', [NotificationController::class, 'showNotification'])->name('notifications.view');
        Route::get('/send-all', [NotificationController::class, 'notifyAll'])->name('notifications.send-all');
        Route::get('/send-applicant', [NotificationController::class, 'notifyApplicant'])->name('notifications.send-applicant');
        // posts
        Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('notifications.notification');
        Route::post('/send-notification-app', [NotificationController::class, 'sendNotificationApplicant'])->name('notifications.notification-app');
        Route::put('/notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');
        Route::get('/check-unread', [NotificationController::class, 'checkUnread'])->name('notifications.checkUnread');
    });
});

//SCHOOL YEAR MANAGEMENT
Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::prefix('school-years')->group(function () {
        Route::get('/list', [SchoolYearController::class, 'index'])->name('school-years.list');
        Route::get('/batches/{schoolYear}', [SchoolYearController::class, 'listBatches'])->name('school-years.batches');
        Route::get('/{id}/archive', [SchoolYearController::class, 'archive'])->name('school-years.archive');
        Route::get('/{id}/unarchive', [SchoolYearController::class, 'unarchive'])->name('school-years.unarchive');
        Route::get('/create', [SchoolYearController::class, 'create'])->name('school-years.create');
        Route::post('/store', [SchoolYearController::class, 'store'])->name('school-years.store');
    });
});

//VISUALIZATION
Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/visualizations', [VisualizationController::class, 'index'])->name('visualiation.view');
});


//ADDRESS
Route::get('/regions', [AddressController::class, 'region']);
Route::get('/provinces/{region}', [AddressController::class, 'province']);
Route::get('/municipalities/{province}', [AddressController::class, 'municipality']);
Route::get('/barangays/{municipality}', [AddressController::class, 'barangay']);

//STATUS TABLES
Route::get('/preassessment-list', [StatusTableController::class, 'preassessmentList'])->name('preassessment.list');
Route::get('/examination-list', [StatusTableController::class, 'forExamList'])->name('exam.list');
Route::get('/interview-list', [StatusTableController::class, 'forInterviewList'])->name('interview.list');
Route::get('/final-list', [StatusTableController::class, 'forFinalAssessmentList'])->name('final-assessment.list');

require __DIR__ . '/auth.php';
require __DIR__ . '/mancom.php';
require __DIR__ . '/evaluator.php';
require __DIR__ . '/staff.php';
require __DIR__ . '/applicant.php';
