<?php

namespace App\Modules\User\Services;

use Illuminate\Support\Facades\Auth;

class UserService
{
    const USER_TYPE_ADMIN = 'ADMIN';
    const USER_TYPE_BLOGGER = 'BLOGGER';
    public static function isAdmin(): bool
    {
        return (Auth::user()->type == self::USER_TYPE_ADMIN) ;
    }
    public static function loggedInBloggerId()
    {
        return (Auth::user()->type != self::USER_TYPE_ADMIN) ? Auth::user()->id : "";
    }
}
