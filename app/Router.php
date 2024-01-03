<?php

namespace app;

require_once 'Autoloader.php';

class Router
{

    public static function get($path = '/', $controller = '', $action = null)
    {
        return self::handle('GET', $path, $controller, $action);
    }

    public static function post($path = '/', $controller = '', $action = null)
    {
        return self::handle('POST', $path, $controller, $action);
    }

    public static function put($path = '/', $controller = '', $action = null)
    {
        if(!isset($_POST['_method'])){
            return;
        }

        if($_POST['_method'] != 'UPDATE'){
            return;
        }

        return self::handle('POST', $path, $controller, $action);
    }

    public static function delete($path = '/', $controller = '', $action = null)
    {

        if(!isset($_POST['_method'])){
            return;
        }

        if($_POST['_method'] != 'DELETE'){
            return;
        }
        
        return self::handle('POST', $path, $controller, $action);
    }

    public static function handle($method = 'GET', $path = '/', $controller = '', $action = null)
    {

        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];

        $currentUri = parse_url($currentUri, PHP_URL_PATH);

        if ($currentMethod != $method) {
            return false;
        }
        
        //$root = '(?:\?(?P<query>.+))?';

        $pattern = '#^' . preg_replace('/{([^\/]+)}/', '(?P<$1>\d+)', $path) .     '$#siD';


        if (  preg_match($pattern , $currentUri, $matches)) {

            if (is_callable($controller)) {
                $controller($matches);
            } else {
                $controller = '\\controller\\' . $controller;
                $controller = new $controller();
                 $controller->$action($matches);
                exit();
            }
        }
    }
}
