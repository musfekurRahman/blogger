<?php

namespace App\Modules\Content\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Repositories\CategoryRepositoryInterface;
use App\Modules\Content\Repositories\ContentRepositoryInterface;
use App\Modules\Content\Requests\StoreRequest;
use App\Modules\User\Services\UserService;
use App\Services\UtilsService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ContentController extends Controller
{
    public function __construct(protected ContentRepositoryInterface $contentRepository, protected CategoryRepositoryInterface $categoryRepository)
    {
    }

    public function index(Request $request): view
    {
        $contents = $this->contentRepository->findAllWithCondition(['paginate' => UtilsService::PAGINATION_PER_PAGE_CONTENT_FOR_ADMIN, 'blogger_id' => UserService::loggedInBloggerId()]);
        return view('content.index', [
            'contents' => $contents
        ]);
    }
    public function create(Request $request): view
    {
        $categories = $this->categoryRepository->allActive();
        return view('content.create',[
            'categories' => $categories,
        ]);
    }

    /**
     * @throws Exception
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {

            $contents = $request->validated();
            $category = $contents['categories'];
            $contents = $this->contentRepository->generateContentForCreate($contents);
            $this->contentRepository->create($contents);
            $this->categoryRepository->updateTotal($category);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }

        return redirect()->route('content.create')->with('success', 'Content Created created successfully!');
    }

    public function contentDetails(Request $request): view
    {
        $name = $request->route('name');
        $id = UtilsService::getIdFromUrlPart($name);
        $content = $this->contentRepository->find($id);
        $categories = $this->categoryRepository->allActive();
        return view('content.details', [
            'content' => $content,
            'categories' => $categories,
        ]);
    }
}
