<?php

use App\Http\Controllers\ProfileController;
use App\Modules\Blogger\Middleware\BlogUserIsValid;
use App\Modules\Content\Controllers\ContentController;
use App\Modules\User\Services\UserService;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(BlogUserIsValid::class.":". UserService::USER_TYPE_BLOGGER.",". UserService::USER_TYPE_ADMIN)->group(function () {
    //blogger and admin common access
    Route::get('/contents', [ContentController::class, 'index'])->name('content.index');
});

