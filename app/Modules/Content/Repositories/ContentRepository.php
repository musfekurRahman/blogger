<?php

namespace App\Modules\Content\Repositories;


use App\Modules\Blogger\Repositories\BloggerRepositoryInterface;
use App\Modules\Content\Models\Contents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ContentRepository implements ContentRepositoryInterface
{
    public function __construct(protected BloggerRepositoryInterface $bloggerRepository)
    {
    }
    public function all(): Collection
    {
        return Contents::all();
    }

    public function find($id)
    {
        return Contents::find($id);
    }

    public function create(array $data)
    {
        return Contents::create($data);
    }

    public function update($id, array $data)
    {
        $model = Contents::find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }

    public function delete($id): bool
    {
        $model = Contents::find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

    public function findWithCondition($conditionArray)
    {
        $content = Contents::where('status', 'PUBLISH');
        $content->orderBy('id', 'desc');

        if (isset($conditionArray['category'])) {
            $content->where('categories', 'like', '%' . $conditionArray['category'] . '%');
        }

        if (isset($conditionArray['blogger_id'])) {
            $content->where('blogger_id', $conditionArray['blogger_id']);
        }

        return $content->paginate($conditionArray['paginate']);
    }
    public function findAllWithCondition($conditionArray)
    {
        $content = Contents::orderBy('id', 'desc');
        if (!empty($conditionArray['blogger_id'])) {
            $content->where('blogger_id', $conditionArray['blogger_id']);
        }
        return $content->paginate($conditionArray['paginate']);
    }
    public  function generateContentForCreate($contents){
        $contents['blogger_id'] =  $this->bloggerRepository->getBloggerIdByUserId(Auth::user()->id);
        $contents['author_name'] =  Auth::user()->name;
        $contents['categories'] =  json_encode($contents['categories']);
        return $contents;
    }
}
