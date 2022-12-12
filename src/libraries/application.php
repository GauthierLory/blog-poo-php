<?php

class Application
{
    /**
     * @return void
     */
    public static function process(): void
    {
        $controllerName = "Article";
        $task = "index";

        if(!empty($_GET['controller'])){
            // Get => article
            // Article
            $controllerName = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['task'])){
            $task = $_GET['task'];
        }

        $controllerName = "\Controllers\\" . $controllerName;

        $controller = new $controllerName();
        $controller->$task();
    }
}