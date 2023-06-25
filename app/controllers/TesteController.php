<?php

namespace app\controllers;
use app\database\models\Product;

class TesteController extends Controller
{
    public function index()
    {
        $product = new Product;
        $products = $product->fetchAll();
        $this->view(
            'painel',
            [
                'title' => 'Teste | myProduct',
                'products' => $products
            ]
        );
    }
}