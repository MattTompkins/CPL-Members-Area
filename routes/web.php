<?php

use App\Http\Controllers\ContactController;
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

    // Events
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/manage', [EventController::class, 'manageEvents'])->name('events.manage');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/create', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::post('/events/edit/{id}', [EventController::class, 'update'])->name('events.update');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    // TO ADD /signups

    // Members management
    Route::get('/members', [ManageMembersController::class, 'index'])->name('members.index');
    Route::get('/members/create', [ManageMembersController::class, 'create'])->name('members.create');
    Route::post('/members/create', [ManageMembersController::class, 'store'])->name('members.store');
    Route::get('/members/edit/{id}', [ManageMembersController::class, 'edit'])->name('members.edit');
    Route::post('/members/edit/{id}', [ManageMembersController::class, 'update'])->name('members.update');
    Route::get('/members/groups', [ManageMembersController::class, 'groupsIndex'])->name('members.groups');

    // Member profiles - Not yet complete
    Route::get('/profile/{id}')->name('member.profile');

    // Profile - To become account settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/image/update', [ProfileController::class, 'updateImage'])->name('profile.image.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Exec - Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts/create', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/show/{id}', [ContactController::class, 'show'])->name('contacts.show');

});

require __DIR__.'/auth.php';
