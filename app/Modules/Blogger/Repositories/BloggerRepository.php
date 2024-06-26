<?php

namespace App\Modules\Blogger\Repositories;

use App\Modules\Blogger\Models\Bloggers;
use App\Services\UtilsService;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class BloggerRepository implements BloggerRepositoryInterface
{
    public function all(): Collection
    {
        return Bloggers::all();
    }

    public function find($id)
    {
        return Bloggers::find($id);
    }

    public function create(array $data)
    {
        return Bloggers::create($data);
    }

    public function update($id, array $data)
    {
        $model = Bloggers::find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }

    public function delete($id): bool
    {
        $model = Bloggers::find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

    /**
     * @throws Exception
     */
    public function createForRegistration(array $request)
    {
        $blogName = UtilsService::characterOnlySanitize($request['blog_name']);
        $slug = $this->generateSlug($blogName);
        $payload = [
            'title' => $blogName,
            'slug' => $slug,
            'user_id' => $request['user']->id,
        ];
        return $this->create($payload);
    }

    public function getSlugCount($slug, $id = 0)
    {
        $blogger = Bloggers::where([
            'slug' => $slug
        ]);
        if ($id != 0) {
            $blogger->orWhere('id', $id);
        }
        return $blogger->count();
    }

    public function getBloggerId($slug, $userId = '')
    {
        $blogger = Bloggers::where([
            'slug' => $slug
        ]);
        if (!empty($userId)) {
            $blogger->orWhere('user_id', $userId);
        }
        $blogger->select('id');
        return $blogger->first();
    }

    public function generateSlug(string $name): string
    {
        $name = str_replace(' ', '-', strtolower($name));
        $getSlugCount = $this->getSlugCount($name);
        if ($getSlugCount == 0) {
            return $name;
        }
        return $name . '-' . UtilsService::generateRandomString(5);
    }

    public function getBloggerIdByUserId($userId)
    {
        $blogger = Bloggers::where([
            'user_id' => $userId
        ]);
        $blogger->select('id');
        return $blogger->first()->id;
    }

    public function getBloggerByUserId($userId)
    {
        $blogger = Bloggers::where([
            'user_id' => $userId
        ]);
        return $blogger->first();
    }
}
