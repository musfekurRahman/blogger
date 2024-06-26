<?php

namespace App\Modules\Blogger\Repositories;

interface BloggerRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function createForRegistration(array $request);
    public function getSlugCount($slug, $id = 0);

    public function getBloggerId($slug, $userId = '');
    public function generateSlug(string $name);

    public function getBloggerIdByUserId($userId);

    public function getBloggerByUserId($userId);


}
