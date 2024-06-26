<?php

namespace App\Modules\Category\Middleware;

use App\Modules\Category\Repositories\CategoryRepositoryInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultMiddleware
{
    public function __construct(protected CategoryRepositoryInterface $bloggerRepository)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
