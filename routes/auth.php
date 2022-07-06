<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Staff\Auth\AuthenticatedSessionController as StaffAuth;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminAuth;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\Admin\AdminController;
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

    Route::get('/terms', [MemberController::class, 'display_terms'])
                ->name('terms-and-conditions');
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

    Route::resource('gym', GymController::class);

    Route::post('/gym/register-member', [GymController::class, 'store'])
                ->name('gym-register-member');

    Route::post('/gym/store-member', [GymController::class, 'store_member_details'])
                ->name('store-member-details');

    Route::post('/pw/change', [MemberController::class, 'password_change'])
                ->name('password-change-member');

    Route::get('/pw/change/member', [MemberController::class, 'password_change_ui'])
                ->name('password-change-ui');

    Route::get('/gyms', [GymController::class, 'gyms'])
                ->name('gyms');

    

    
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
        Route::post('/gym-update', [StaffController::class,'gym_update'])->name('gym-update');
        Route::post('/plan-create', [StaffController::class,'plan_create'])->name('plan-create');

        Route::post('/plan/edit', [GymController::class, 'edit_plan'])
                ->name('edit-plan');

        Route::post('/member/activate', [GymController::class, 'activate_member'])
                ->name('activate-member');

        Route::post('/member/create', [GymController::class, 'create_member'])
                ->name('create-member');

        Route::post('/edit-member', [GymController::class, 'edit_member'])
                ->name('edit-member');

        Route::get('/password/change', [StaffController::class,'staff_change_password_ui'])->name('staff_change_password_ui');

        Route::post('/password/change/staff', [StaffController::class,'staff_change_password'])->name('staff_change_password');

        Route::get('/delete/{member_id}', [MemberController::class, 'delete_member'])
                ->name('delete-member');

        Route::get('/delete/plan/{plan_id}', [GymController::class, 'delete_plan'])
                ->name('delete-plan');

    });

  
});


# Admin routes
Route::prefix('/admin')->name('admin.')->group(function(){
        Route::get('/login', [AdminAuth::class, 'create'])->middleware('guest:admin')->name('login');
        Route::post('/login', [AdminAuth::class, 'store'])->middleware('guest:admin');
    
        
    
        Route::middleware('admin')->group(function(){
            Route::get('/logout', [AdminAuth::class, 'destroy'])->name('logout');
    
            Route::get('/dashboard', [AdminController::class,'index']);
            Route::get('/create', [AdminController::class,'create'])->name('create');
            Route::post('/store', [AdminController::class,'store'])->name('store');

            Route::get('/password/change', [AdminController::class,'admin_change_password_ui'])->name('admin_change_password_ui');

            Route::post('/password/change/staff', [AdminController::class,'admin_change_password'])->name('admin_change_password');
                
            Route::get('/delete/member/{member_id}', [AdminController::class, 'delete_member'])
                ->name('delete-member');

            Route::get('/delete/owner/{member_id}', [AdminController::class, 'delete_owner'])
                ->name('delete-owner');

            Route::get('/gyms', [AdminController::class,'gyms']);

            Route::get('/delete/gym/{gym_id}', [AdminController::class, 'delete_gym'])
                ->name('delete-gym');
        
            Route::get('/plans', [AdminController::class,'plans']);

            Route::get('/delete/plan/{plan_id}', [AdminController::class, 'delete_plan'])
                ->name('delete-plan');

            Route::get('/locations', [AdminController::class,'locations']);

            Route::post('/location/create', [AdminController::class, 'create_location'])
                ->name('create-location');
    
        });
    
    });