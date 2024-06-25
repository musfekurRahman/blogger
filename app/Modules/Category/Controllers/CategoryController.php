<?php

namespace App\Modules\Category\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Repositories\CategoryRepositoryInterface;
use App\Modules\Content\Repositories\ContentRepositoryInterface;
use App\Services\UtilsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(protected ContentRepositoryInterface $contentRepository, protected CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function index(Request $request): view
    {
        $category = $request->route('name');
        $contents = $this->contentRepository->findWithCondition(['category' => $category, 'paginate' => UtilsService::PAGINATION_PER_PAGE_CONTENT]);
        $categories = $this->categoryRepository->allActive();
        return view('homepage', [
            'contents' => $contents,
            'categories' => $categories
        ]);
    }

}
