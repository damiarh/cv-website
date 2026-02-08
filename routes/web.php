<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PersonalInformationController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\WorkExperienceController;
use App\Http\Controllers\Admin\AwardController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ReferenceController;

// Public CV routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/print', [HomeController::class, 'print'])->name('cv.print');

// Admin Authentication routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('admin.login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('admin.logout');
    
    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Personal Information (only one record)
        Route::get('personal-information', [PersonalInformationController::class, 'edit'])->name('admin.personal-information.edit');
        Route::put('personal-information', [PersonalInformationController::class, 'update'])->name('admin.personal-information.update');
        
        // Education CRUD
        Route::resource('education', EducationController::class)->names('admin.education');
        
        // Work Experience CRUD
        Route::resource('work-experience', WorkExperienceController::class)->names('admin.work-experience');
        
        // Awards CRUD
        Route::resource('awards', AwardController::class)->names('admin.awards');
        
        // Skills CRUD
        Route::resource('skills', SkillController::class)->names('admin.skills');
        
        // References CRUD
        Route::resource('references', ReferenceController::class)->names('admin.references');
    });
});