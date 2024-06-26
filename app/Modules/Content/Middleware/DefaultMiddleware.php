<?php

namespace App\Modules\Content\Middleware;

use App\Modules\Content\Repositories\ContentRepositoryInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultMiddleware
{
    public function __construct(protected ContentRepositoryInterface $bloggerRepository)
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
