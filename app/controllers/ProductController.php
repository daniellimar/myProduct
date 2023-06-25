<?php

namespace app\controllers;

use app\core\Request;
use app\database\models\Category;
use app\database\models\Product;
use app\database\models\ProductCategory;

class ProductController extends Controller
{
    public function show()
    {
        $id = (int)Request::input('id');
        $product = new Product;
        $products = $product->findBy('id', $id);
        $categories = $product->Join($id);
        echo json_encode(['products' => $products, 'categories' => $categories]);
    }

    public function create()
    {
        $product = new Product;
        $productCategory = new ProductCategory;

        $data = [
            'sku' => Request::input('sku'),
            'name' => Request::input('name'),
            'description' => Request::input('description'),
            'price' => Request::input('price'),
            'quantity' => Request::input('quantity'),
            'updated' => null
        ];

        $create = $product->create($data);
        $product_id = $product->findBy('sku', Request::input('sku'));

        $categories = explode(',', Request::input('category_id'));
        foreach ($categories as $category) {
            $productCategory->create(['product_id' => $product_id->id, 'category_id' => $category]);
        }

        echo json_encode(['result' => ($create ? true : false)]);
    }

    public function update()
    {
        $product = new Product;
        $id = (int)Request::input('id');

        function limparNumero($string)
        {
            $string = preg_replace('/[^0-9,.]/', '', $string);
            $string = str_replace(',', '.', $string);

            $string = preg_replace('/\.(?=.*\.)/', '', $string);
            $string = preg_replace('/(\.[0-9]{2})[0-9]+/', '$1', $string);
            return $string;
        }

        $data = [
            'sku' => Request::input('sku'),
            'name' => Request::input('name'),
            'description' => Request::input('description'),
            'price' => (float)limparNumero(Request::input('price')),
            'quantity' => Request::input('quantity'),
        ];

        $update = $product->update('id', $id, $data);
        echo json_encode(['result' => ($update ? true : false)]);
    }

    public function delete()
    {
        $id = (int)Request::input('id');

        $productCategory = new ProductCategory;
        $productCategory->delete('product_id', $id);

        $product = new Product;
        $delete = $product->delete('id', $id);

        echo json_encode(['result' => $delete]);
    }

    public function import()
    {
        $file = $_FILES['import'];
        $csvFile = $file['tmp_name'];

        // Abrir o arquivo CSV para leitura
        $file = fopen($csvFile, 'r');


        if ($file !== false) {
            $data = array();
            $separator = ';';
            $linha = 0;
            while (($line = fgetcsv($file, 0, $separator)) !== false) {
                $linha++;

                if ($linha === 1)
                    continue;

                $nome = $line[0];
                $sku = $line[1];
                $descricao = $line[2];
                $quantidade = $line[3];
                $preco = $line[4];
                $categoria = $line[5];

                $item = array(
                    'sku' => $sku,
                    'name' => $nome,
                    'description' => $descricao,
                    'quantity' => $quantidade,
                    'price' => $preco,
                );

                $product = new Product;
                $category = new Category();
                $productCategory = new ProductCategory;

                $create = $product->create($item);
                $product_id = $product->findBy('sku', $sku);

                $categories = explode("|", $categoria);
                foreach ($categories as $categoria) {
                    $consulta_category = $category->findBy('name', $categoria);

                    if(!$consulta_category) {
                        $consulta_category = $category->create(['name' => $categoria]);
                        $consulta_category = $category->findBy('name', $categoria);
                    }

                    $category_id = $consulta_category->id;


                    $productCategoryProd = $productCategory->findBy('product_id', (int)$product_id);
                    $productCategoryProdCat = $productCategory->findBy('category_id', (int)$category_id);

                    if(!$productCategoryProd && !$productCategoryProdCat){
                        $productCategory->create(['product_id' => $product_id->id, 'category_id' => $category_id]);
                    }
                }
            }
            fclose($file);
        } else {
            echo "Erro ao abrir o arquivo CSV.";
        }
        header('location: /painel');
    }
}