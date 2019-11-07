<?php


class Router
{
    protected $routes = [];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri)
    {
        //example.com/about/culture

        if (array_key_exists($uri, $this->routes)) {

            return $this->routes[$uri];
        }else{
            $uri = "home";
            return $this->routes[$uri];
        }



    }


}