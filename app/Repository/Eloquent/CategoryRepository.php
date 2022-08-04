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

    public function updateCategory($id, $data)
    {
        $category = Category::find($id);
        $response = $category->update($data);
        return $response;
    }

    public function tree($id = null)
    { 
        $results = $this->all($id);
        foreach ($results as $key => $value) {
            $results[$key]->child = $this->tree($results[$key]->id);
        }

        return $results;
    }

    public function all($id)
    {
        $condition = " = $id";

        if (!$id) {
            $condition = " IS NULL";
        }

        $query = "SELECT  parent.id, parent.title, parent.description , parent.is_active, parent.id_parent, m.path,
        (SELECT COUNT(*) FROM `category` as ct WHERE  ct.id_parent = parent.id) AS child_count 
        FROM `category` AS parent  
        LEFT JOIN media as m ON parent.id = m.id_category
        WHERE parent.id_parent" . $condition . "";
        $results = DB::connection('mysql')->select(DB::raw($query));
        return $results;
    }
}
