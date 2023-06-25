<?php

namespace app\controllers;

use app\core\Request;
use app\database\models\Category;
use app\database\models\Product;

class PainelController extends Controller
{
    public function index()
    {
        $product = new Product();
        $products = $product->fetchAll();

        $categorie = new Category();
        $categories = $categorie->fetchAll();

        $this->view(
            'painel',
            [
                'title' => 'Painel | myProduct',
                'products' => $products,
                'categories' => $categories,
            ]
        );
    }
}