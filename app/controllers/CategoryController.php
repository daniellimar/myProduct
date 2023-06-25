<?php

namespace app\controllers;

use app\core\Request;
use app\database\models\Category;
use app\database\models\ProductCategory;

class CategoryController
{
    public function show()
    {
        $id = (int)Request::input('id');
        $category = new Category;
        $rows = $category->findBy('id', $id);
        echo json_encode($rows);
    }

    public function create()
    {
        $category = new Category;
        $data = ['name' => Request::input('name')];

        $create = $category->create($data);
        echo json_encode(['result' => ($create ? true : false)]);
    }

    public function update()
    {
        $category = new Category;
        $id = (int)Request::input('id');
        $data = ['name' => Request::input('name')];

        $update = $category->update('id', $id, $data);
        echo json_encode(['result' => ($update ? true : false)]);
    }

    public function delete()
    {
        $id = (int)Request::input('id');

        $productCategory = new ProductCategory;
        $productCategory->delete('product_id', $id);

        $category = new Category;
        $delete = $category->delete('id', $id);
        echo json_encode(['result' => $delete]);
    }
}