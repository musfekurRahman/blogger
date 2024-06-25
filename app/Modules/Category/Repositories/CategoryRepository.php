<?php

namespace App\Modules\Category\Repositories;

use App\Modules\Category\Models\Category;
use Illuminate\Database\Eloquent\Collection;


class CategoryRepository implements CategoryRepositoryInterface
{
    public function all(): Collection
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $model = Category::find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }

    public function delete($id): bool
    {
        $model = Category::find($id);
        if ($model) {
            $model->delete();
            return true;
        }
        return false;
    }

    public function allActive()
    {
        $content = Category::where('status', 'ACTIVE');
        return $content->get();
    }

    public function findByName($name)
    {
        $content = Category::where('name', $name);
        return $content->first();
    }

    public function updateTotal($categories): true
    {
        foreach ($categories as $category) {
            $model = $this->findByName($category);
            if (!empty($model)) {
                Category::find($model->id)->increment('total');
            }
        }
        return true;
    }
}
