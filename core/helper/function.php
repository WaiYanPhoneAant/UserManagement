<?php


function dd($data){
    echo "<pre>";
    print_r($data);
    die;
}
function path(){
    return realpath('.');
}
function view($view,Array $data=[]){
    extract($data);
    return require "./view/$view.view.php";
}

function redirect($route,$data=[]){
    $url="http://localhost:8000"."$route";
     header("location: $url");
     exit();
}

function error($name){
    if(isset($_REQUEST[$name])){
        return true;
    }else{
        return false;
    }
}
function cuurentUri($path){
   return parse_url(trim($path,"/"),PHP_URL_PATH);
}