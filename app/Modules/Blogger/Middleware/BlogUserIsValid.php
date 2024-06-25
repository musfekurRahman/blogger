<?php

namespace App\Modules\Blogger\Middleware;

use App\Modules\Blogger\Repositories\BloggerRepositoryInterface;
use App\Services\UtilsService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class BlogUserIsValid
{
    public function __construct(protected BloggerRepositoryInterface $bloggerRepository)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, string $type): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->type !== $type) {
            return redirect()->route('unauthorized');
        }
        return $next($request);
    }
}
