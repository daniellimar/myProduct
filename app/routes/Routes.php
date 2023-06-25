<?php

namespace app\routes;

class Routes
{
    public function get()
    {
        return [
            'get' => [
                '/' => 'HomeController@index',
                '/painel' => 'PainelController@index',
                '/teste' => 'TesteController@index',
            ],
            'post' => [
                '/product'       => 'ProductController@show',
                '/newProduct'    => 'ProductController@create',
                '/updateProduct' => 'ProductController@update',
                '/deleteProduct' => 'ProductController@delete',
                '/importProduct' => 'ProductController@import',

                '/category'       => 'CategoryController@show',
                '/newCategory'    => 'CategoryController@create',
                '/updateCategory' => 'CategoryController@update',
                '/deleteCategory' => 'CategoryController@delete',
            ],
        ];
    }
}