<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CategoryCreateRequest;
use App\Http\Requests\Admin\Categories\CategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        $this->middleware("auth:admin");
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

        $trans = \Arr::pull($data, 'trans');
        $this->category = $this->category_r->create($data);
        $this->category->trans()->create($trans);

        return $this->jsonResponse(['category' => $this->category->load('trans')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $category = $this->category_r->findById($id);
        if (!$category) return $this->jsonErrorsResponse('category_not_found');
        return $this->jsonResponse($category->load(['childs', 'parents']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, int $id)
    {
        $data = $request->validated();
        $category = $this->category_r->findById($id);

        if (!$category) return $this->responseErrors('category_not_found');

        // Pull from $data trans
        $trans = \Arr::pull($data, 'trans');
        
        // Category Update
        $category->update($data);

        // TranslateCategory Update
        $category->trans()->update($trans);

        return $this->jsonResponse($category->load(['childs', 'parents']), Response::HTTP_ACCEPTED, 'successful_updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $category = $this->category_r->findById($id);

        if (!$category) return $this->jsonErrorsResponse('category_not_found');

        $category->trans()->delete();
        $category->delete();

        return $this->jsonResponse(null, Response::HTTP_NO_CONTENT, "category successful deleted");
    }
}
