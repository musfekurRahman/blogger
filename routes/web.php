<?php

use App\Http\Controllers\ProfileController;
use App\Modules\Blogger\Controllers\BlogController;
use App\Modules\Blogger\Middleware\BlogSlugIsValid;
use App\Modules\Blogger\Middleware\BlogUserIsValid;
use App\Modules\Category\Controllers\CategoryController;
use App\Modules\Content\Controllers\ContentController;
use App\Modules\User\Services\UserService;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'individualBlog'])->middleware(BlogSlugIsValid::class);
Route::get('/content-details/{name}', [ContentController::class, 'contentDetails']);
Route::get('/category/{name}', [CategoryController::class, 'index']);

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

Route::middleware(BlogUserIsValid::class.":".UserService::USER_TYPE_BLOGGER)->group(function () {
    //bloggers only access
    Route::get('/contents/create', [ContentController::class, 'create'])->name('content.create');
    Route::post('/contents/store', [ContentController::class, 'store'])->name('content.store');
});
Route::middleware(BlogUserIsValid::class.":".UserService::USER_TYPE_ADMIN)->group(function () {
    //admin only access
});



Route::get('/unauthorized', function () {
    return response()->view('errors.unauthorized', [], 403);
})->name('unauthorized');
require __DIR__.'/auth.php';
