<?php

namespace App\Modules\Blogger\Middleware;

use App\Modules\Blogger\Repositories\BloggerRepositoryInterface;
use App\Services\UtilsService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogSlugIsValid
{
    public function __construct(protected BloggerRepositoryInterface $bloggerRepository)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');
        if (empty($slug)) {
            return redirect('/');
        }
        $id = UtilsService::getIdFromUrlPart($slug);
        $getSlugCount = $this->bloggerRepository->getSlugCount($slug, $id);
        if ($getSlugCount == 0) {
            $request->session()->flash('error', 'Sorry, we did not found this blog');
            return redirect('/');
        }
        return $next($request);
    }
}
