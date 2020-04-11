<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CategoryCreateRequest;
use App\Http\Requests\Admin\Categories\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $category_r;

    /**
     * Category
     *
     * @var \App\Models\Category
     */
    private $category;

    public function __construct() {
        $this->category_r = new CategoryRepository();
        $this->category_r->setSelect(["id", "slug", "parent_id", "is_active"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category_r->getAll();
        return $this->response($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->validated();

        $this->category = $this->category_r->create([
            'slug'          => $data['slug'],
            'parent_id'     => $data['parent_id'],
            'is_active'     => $data['is_active'],
        ]); // ->load(["childs", "parents", "trans"]);

        $this->category->trans()->create($data['trans']);
        $this->category->with("langs");

        return $this->response(['category' => $this->category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if (!$category) return $this->responseErrors('category_not_found');
        return $this->response($category->load(['childs', 'parents']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        if (!$category) return $this->responseErrors('category_not_found');

        // Category Update
        $category->update([
            'slug'      => $data['slug'],
            'parent_id' => $data['parent_id'],
            'is_active' => $data['is_active'],
        ]);
        
        // TranslateCategory Update
        $category->trans()->update($data['trans']);

        return $this->response($category->load(['childs', 'parents']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!$category) return $this->responseErrors('category_not_found');

        $category->trans()->delete();
        $category->delete();

        return $this->response(null, 200, "category successful deleted");
    }
}
