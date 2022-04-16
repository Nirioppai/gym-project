<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Staff\Auth\AuthenticatedSessionController as StaffAuth;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Staff\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

Route::middleware('guest')->group(function () {
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
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('/dashboard', [MemberController::class, 'index'])->name('member.index');

    Route::get('/gym-register', [MemberController::class, 'gym_register'])->name('member.gym-register');
});



# Staff routes
Route::prefix('/staff')->name('staff.')->group(function(){
    Route::get('/login', [StaffAuth::class, 'create'])->middleware('guest:staff')->name('login');
    Route::post('/login', [StaffAuth::class, 'store'])->middleware('guest:staff');

    Route::get('/create', [StaffController::class,'create'])->name('create');
    Route::post('/store', [StaffController::class,'store'])->name('store');
    

    Route::middleware('staff')->group(function(){
        Route::get('/logout', [StaffAuth::class, 'destroy'])->name('logout');

        Route::get('/dashboard', [StaffController::class,'index']);
        Route::get('/members', [StaffController::class,'members_get']);
        Route::get('/gym-management', [StaffController::class,'gym_management_get']);
        Route::get('/plan-management', [StaffController::class,'plan_management_get']);

        

        Route::post('/gym-create', [StaffController::class,'gym_create'])->name('gym-create');


    });

// Usage of Protected routes

//   Route::get('/simple', function(){
//     return 'Staff Simple';
//   })->middleware('staff');
  
});