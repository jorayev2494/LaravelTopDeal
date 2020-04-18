<?php

namespace App\Repositories;

use App\Models\User as Model;

class UserRepository extends Repository implements IRepository
{

    protected function getModel(): string
    {
        return Model::class;
    }

    public function getAll() : \Illuminate\Database\Eloquent\Collection
    {
        return $this->getModelClone()->all($this->getSelect());
    }

    public function findById(int $id)
    {
        return $this->getModelClone()->find($id, $this->getSelect());
    }

    public function whereByEmail(string $email)
    {
        return $this->getModelClone()->select($this->getSelect())->whereEmail($email)->get();
    }

    public function findByEmail(string $email)
    {
        return $this->getModelClone()->select($this->getSelect())->whereEmail($email)->first();
    }

}
