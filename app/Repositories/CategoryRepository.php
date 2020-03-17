<?php

namespace App\Repositories;

use App\Models\Category as Model;

class CategoryRepository extends Repository implements IRepository
{

    protected function getModel(): string
    {
        return Model::class;
    }

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        $build = $this->getModelClone()->all($this->getSelect());
        return $build;
    }

    public function findById(int $id): \Illuminate\Database\Eloquent\Model
    {
        return $this->getModelClone()->select($this->getSelect())->find($id);
    }
    
}
