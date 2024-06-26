<?php

namespace App\Modules\User\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blogger\Repositories\BloggerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(protected BloggerRepositoryInterface $bloggerRepository)
    {
    }

    public function dashboard(Request $request): view
    {
      $user = Auth::user();
      $blogger = $this->bloggerRepository->getBloggerByUserId($user->id);
        return view('dashboard', [
            'user' => $user,
            'blogger' => $blogger,
        ]);
    }
}
