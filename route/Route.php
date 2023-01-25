<?php

namespace Route;

class Route{
    private static $Route;
    private static $uri;
    private $routes=[
        "GET"=>[],
        "POST"=>[],
    ];
    private function __construct()
    {
        //private access 
    }
    // build route class
    private static function build(){
        if(!self::$Route instanceof Route){
            self::$Route=new Route();
        }
    }
    //route method build
    private static function routeMethodBuild($method,$uri,$controller){
        self::build();
        self::$Route->routes[$method][trim($uri,'/')]=$controller;
        return self::$Route;
    }

    // get mehtod create
    public static function get($uri,$controller){
        self::routeMethodBuild("GET",$uri,$controller);
    }
    
    // post method create
    public static function post($uri,$controller){
        self::routeMethodBuild("POST",$uri,$controller);

    }
    //get uri
    public static function uri($path){
        self::build();
        self::$uri=parse_url(trim($path,"/"),PHP_URL_PATH);
        return self::$Route;
    }
    //direct controller
    public function direct($method)
    {
        $this->build();
        $tes=self::$uri;
        if(!array_key_exists(self::$uri, $this->routes[$method])){
            die('404');
        };
        $explode=$this->routes[$method][self::$uri];
        return $this->callMethod($explode[0],$explode[1]);
    }
    private function callMethod($class,$method){
        $class=new $class;
        $class->$method();
    }
   
}