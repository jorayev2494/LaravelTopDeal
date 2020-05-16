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

        $build->map(function($category) {
            $category->load(['childs', 'parents']);
        });

        return $build;
    }

    public function findById(int $id)
    {
        $build = $this->getModelClone()->select($this->getSelect())->find($id); // ->with(['childs', 'parents'])->get();
        // if($build) {
        //     if ($build->hasChildren())  
        //     $load[] = "childs";
        //     if ($build->hasParent())    
        //     $load[] = "parents";
            
        //     $build->load($load);
        // }
        // dd($build);

        return $build;

    }
}
