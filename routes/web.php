<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



// Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth','admin'])->name('admindashboard');


Route::get('/admin/user', [UserController::class, 'index'])->middleware(['auth','admin'])->name('user.index');
Route::post('/admin/user', [UserController::class, 'store'])->name('store');
Route::get('/admin/user/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('update');
Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('delete');

Route::get('/admin/event', [EventController::class, 'index'])->middleware(['auth','admin'])->name('event.index');
Route::post('/admin/event', [EventController::class, 'store'])->name('event.store');
Route::get('/admin/event/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::post('/admin/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::get('/admin/event/delete/{id}', [EventController::class, 'delete'])->name('event.delete');

Route::get('/admin/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/admin/event/complete/{id}', [EventController::class, 'event_complete'])->name('event.complete');
Route::get('admin/dashboard', [EventController::class, 'admindashboard'])->middleware(['auth','admin'])->name('admindashboard');


//user events
Route::get('/user/event', [UserController::class, 'userevent'])->name('user.event');
Route::post('/admin/events/bulk-participate', [EventController::class, 'bulkParticipate'])->name('events.bulkParticipate');
