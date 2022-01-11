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
#profile
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::get('/setting', [ProfileController::class, 'setting'])->name('setting');
    Route::get('/edit/personal-info/{seeker_profile}', [ProfileController::class, 'edit'])->name('personal-info-edit');
    Route::put('/update/personal-info/{seeker_profile}', [ProfileController::class, 'update'])->name('personal-info-update');
    Route::get('/create/personal-info', [ProfileController::class, 'create'])->name('personal-info-create');
    Route::post('/store/personal-info', [ProfileController::class, 'store'])->name('personal-info-store');
#edu
    Route::get('/create/education-info', [ProfileController::class, 'createEdu'])->name('education-info-create');
    Route::post('/store/education-info', [ProfileController::class, 'storeEdu'])->name('education-info-store');
    Route::get('/edit/education-info/{education_detail}', [ProfileController::class, 'editEdu'])->name('education-info-edit');
    Route::post('/update/education-info/{education_detail}', [ProfileController::class, 'updateEdu'])->name('education-info-update');
    Route::delete('/delete/education-info/{education_detail}', [ProfileController::class, 'deleteEdu'])->name('education-info-delete');
#exp
    Route::get('/create/experience-info', [ProfileController::class, 'createExp'])->name('experience-info-create');
    Route::post('/store/experience-info', [ProfileController::class, 'storeExp'])->name('experience-info-store');
    Route::get('/edit/experience-info/{experience_detail}', [ProfileController::class, 'editExp'])->name('experience-info-edit');
    Route::post('/update/experience-info/{experience_detail}', [ProfileController::class, 'updateExp'])->name('experience-info-update');
    Route::delete('/delete/experience-info/{experience_detail}', [ProfileController::class, 'deleteExp'])->name('experience-info-delete');
#skillset
    Route::get('/create/skillset-info', [ProfileController::class, 'createSkillSet'])->name('skillset-info-create');
    Route::post('/store/skillset-info', [ProfileController::class, 'storeSkillSet'])->name('skillset-info-store');
    Route::get('/skillset-categories/get/skill-set', [ProfileController::class, 'getAllSkillSet']);
});


Route::get('/recruiter/dashboard', function () {
    return 'this is recuriter dashboard';
})->middleware(['role:recruiter']);