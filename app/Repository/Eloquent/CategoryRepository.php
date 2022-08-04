<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\CategoryRepositoryInterface;
use DB;

class CategoryRepository   implements CategoryRepositoryInterface
{
    public function __construct()
    {
    }

    public function createCategory($data)
    {
        return Category::create($data);
    }

    public function updateCategory($id , $data) {
        $category = Category::find($id);
        $response = $category->update($data);
        return $response;
    }
}
