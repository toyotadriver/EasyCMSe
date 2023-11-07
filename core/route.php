<?php
class Route{
    static function start(){
        $controller_name = 'main';
        $action_name = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])){
            $controller_name = $routes[1];
        }
        if (!empty($routes[2])){
            $action_name = $routes[2];
        }
        $model_name = 'model_' . $controller_name;
        $controller_file = 'controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        $model_file = $model_name . '.php';
        $model_path = 'models/' . $model_file;
        if ((file_exists($model_path))){
            include $model_path;
        }
        $controller_file = $controller_file . '.php';
        $controller_path = 'controllers/' . $controller_file;
        if (file_exists($controller_path)){
            include $controller_path;
        } else{
            self::ErrorPage404();
        }
        $cname = 'Controller_' . ucfirst($controller_name);
        $controller = new $cname;
        $action = $action_name;
        if (method_exists($controller, $action)){
            $controller->$action();
        } else{
            self::ErrorPage404();
        }
    }
    static function ErrorPage404(){

        
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location: ' . $host . '404');

    }
}
?>