<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware(['role:job_seeker'])->prefix('profile')->name('profile.')->group(function(){
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/setting', [ProfileController::class, 'setting'])->name('setting');
    Route::get('/create/personal-info', [ProfileController::class, 'create'])->name('personal-info-create');
    Route::post('/store/personal-info', [ProfileController::class, 'store'])->name('personal-info-store');
    Route::get('/create/education-info', [ProfileController::class, 'createEdu'])->name('education-info-create');
    Route::post('/store/education-info', [ProfileController::class, 'storeEdu'])->name('education-info-store');
});


Route::get('/recruiter/dashboard', function () {
    return 'this is recuriter dashboard';
})->middleware(['role:recruiter']);