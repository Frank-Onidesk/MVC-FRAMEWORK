<?php

namespace  app\core;

class Router{
    public Request $request;
    protected array $routes = [];

    public  function  __construct(Request $request){
        $this->request  = $request;
    }

    public function get($path, $callback){
    $this->routes['get'][$path] = $callback;
    }


    public function  resolve(){
       /*
        echo "<pre>";
        print_r($_SERVER);
        echo "</pre>";
       */

        $path =  $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if($callback===false){
            echo "Not found !";
            exit();
        }

        // se existir endpoint
        echo call_user_func($callback);

    }
}