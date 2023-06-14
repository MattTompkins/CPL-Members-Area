<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Events
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/manage', [EventController::class, 'manageEvents'])->name('events.manage');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

    // Training

    // Expenses

    // Member management
    Route::get('/members', [MemberController::class, 'index'])->name('members.index');
    Route::get('/members/create', [MemberController::class, 'create'])->name('members.create');
    Route::post('/members/create', [MemberController::class, 'store'])->name('members.store');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
