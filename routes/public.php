<?php

use App\Modules\Blogger\Controllers\BlogController;
use App\Modules\Blogger\Middleware\BlogSlugIsValid;
use App\Modules\Category\Controllers\CategoryController;
use App\Modules\Content\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/blog/{slug}', [BlogController::class, 'individualBlog'])->middleware(BlogSlugIsValid::class);
Route::get('/content-details/{name}', [ContentController::class, 'contentDetails']);
Route::get('/category/{name}', [CategoryController::class, 'index']);

Route::get('/unauthorized', function () {
    return response()->view('errors.unauthorized', [], 403);
})->name('unauthorized');

