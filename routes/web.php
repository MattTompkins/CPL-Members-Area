<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ManageMembersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Events - Backend
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/manage', [EventController::class, 'manageEvents'])->name('events.manage');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

    // Members management
    Route::get('/members', [ManageMembersController::class, 'index'])->name('members.index');
    Route::get('/members/create', [ManageMembersController::class, 'create'])->name('members.create');
    Route::post('/members/create', [ManageMembersController::class, 'store'])->name('members.store');
    Route::get('/members/show/{id}', [ManageMembersController::class, 'show'])->name('members.show');
    Route::get('/members/edit/{id}', [ManageMembersController::class, 'edit'])->name('members.edit');
    Route::post('/members/edit/{id}', [ManageMembersController::class, 'update'])->name('members.update');

    // Member profiles - Not yet complete
    Route::get('/profile/{id}')->name('member.profile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
