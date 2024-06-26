<?php

use App\Modules\Blogger\Middleware\BlogUserIsValid;
use App\Modules\User\Services\UserService;
use Illuminate\Support\Facades\Route;

Route::middleware(BlogUserIsValid::class.":".UserService::USER_TYPE_ADMIN)->group(function () {
    //admin only access
});

