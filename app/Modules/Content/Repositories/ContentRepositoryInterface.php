<?php

namespace App\Modules\Content\Repositories;

interface ContentRepositoryInterface
{
    public function all();

    public function find($id);

    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);

    public function findWithCondition($conditionArray);

    public function findAllWithCondition($conditionArray);
    public  function generateContentForCreate($contents);
}
