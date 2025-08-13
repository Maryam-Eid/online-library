<?php
use App\Http\Controllers\Student\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Student\Auth\NewPasswordController;
use App\Http\Controllers\Student\Auth\PasswordController;
use App\Http\Controllers\Student\Auth\PasswordResetLinkController;
use App\Http\Controllers\Student\ProfileController;
use App\Http\Controllers\Student\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::prefix('student')->name('student.')->group(function () {
    Route::group(['middleware' => ['guest:student']], function () {
        Route::get('register', [RegisteredUserController::class, 'create'])
            ->name('register');

        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
            ->name('password.request');

        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
            ->name('password.email');

        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
            ->name('password.reset');

        Route::post('reset-password', [NewPasswordController::class, 'store'])
            ->name('password.store');
    });

    Route::middleware('isStudent')->group(function () {
        Route::view('/dashboard', 'student.dashboard')
            ->name('dashboard');

        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});
