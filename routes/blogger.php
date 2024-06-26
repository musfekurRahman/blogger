<?php

use App\Modules\Blogger\Middleware\BlogUserIsValid;
use App\Modules\Content\Controllers\ContentController;
use App\Modules\User\Services\UserService;
use Illuminate\Support\Facades\Route;


Route::middleware(BlogUserIsValid::class.":".UserService::USER_TYPE_BLOGGER)->group(function () {
    //bloggers only access
    Route::get('/contents/create', [ContentController::class, 'create'])->name('content.create');
    Route::post('/contents/store', [ContentController::class, 'store'])->name('content.store');
});

