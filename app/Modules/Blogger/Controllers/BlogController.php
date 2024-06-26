<?php

namespace App\Modules\Blogger\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blogger\Repositories\BloggerRepositoryInterface;
use App\Modules\Category\Repositories\CategoryRepositoryInterface;
use App\Modules\Content\Repositories\ContentRepositoryInterface;
use App\Services\UtilsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct(protected BloggerRepositoryInterface $bloggerRepository, protected ContentRepositoryInterface $contentRepository, protected CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function individualBlog(Request $request): view
    {
        $slug = $request->route('slug');
        $id = UtilsService::getIdFromUrlPart($slug);
        $blogger = $this->bloggerRepository->getBloggerId($slug, $id);
        $contents = $this->contentRepository->findWithCondition(['paginate' => UtilsService::PAGINATION_PER_PAGE_CONTENT, 'blogger_id' => $blogger->id]);
        $categories = $this->categoryRepository->allActive();
        return view('homepage', [
            'contents' => $contents,
            'categories' => $categories
        ]);
    }

    public function index(Request $request): view
    {
        $contents = $this->contentRepository->findWithCondition(['paginate' => UtilsService::PAGINATION_PER_PAGE_CONTENT]);
        $categories = $this->categoryRepository->allActive();
        return view('homepage', [
            'contents' => $contents,
            'categories' => $categories
        ]);
    }
}
