<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Category Repository
     *
     * @var \App\Repositories\CategoryRepository;
     */
    private $category_r;

    public function __construct(CategoryRepository $categoryRepository) {
        $this->category_r = $categoryRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $categories = $this->category_r->getAll();
        return $this->jsonResponse($categories, Response::HTTP_OK);
    }
}
