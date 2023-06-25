<?php

namespace app\core;

use Exception;

class Request
{
    public function input($name)
    {
        if(isset($_POST[$name])) {
            return $_POST[$name];
        }
//        throw new Exception("O indíce não existe");
    }

    public function all()
    {
        return $_POST;
    }

    public function only($only)
    {
        $fieldsPost = self::all();
        $onlyArray = is_string($only) ? [$only] : $only;
        return array_intersect_key($fieldsPost, array_flip($onlyArray));
    }

    public function excepts($excepts)
    {
        $fieldsPost = self::all();

        if (is_array($excepts)) {
            return array_diff_key($fieldsPost, array_flip($excepts));
        }

        if (is_string($excepts)) {
            unset($fieldsPost[$excepts]);
        }
        return $fieldsPost;
    }

    public static function query($name)
    {
        if(!isset($_GET[$name])) {
            throw new Exception("Não existe a query string {$name}");
        }
        return $_GET[$name];
    }

    public static function toJson($data)
    {
        return json_encode($data);
    }

    public static function toArray($data)
    {
        if(isJson($data)) {
            return json_decode($data);
        }
    }
}