<?php

namespace app\core;

class Controller
{
    public function execute($router)
    {
        list($controller, $method) = explode('@', $router);

        $namespace = "app\controllers\\";
        $controllerNamespace = $namespace.$controller;

        if(!class_exists($controllerNamespace)) {
            throw new \Exception("O controller não existe.");
        }

        $controller = new $controllerNamespace();

        if(!method_exists($controller, $method)) {
            throw new \Exception("O método não existe no controller.");
        }

        $params = new ControllerParams;
        $params = $params->get($router);

        $controller->$method($params);
    }
}