<?php

use model\User;

// die dump 
function dd($data){
    echo "<pre>";
    print_r($data);
    die;
}

//current path
function path(){
    return realpath('.');
}

//redirect view
function view($view,Array $data=[]){
    extract($data);
    return require "./view/$view.view.php";
}

//redirect route
function redirect($route,$data=[]){
    $url="http://localhost:8000"."$route";
     header("location: $url");
     exit();
}

// check error
function error($name){
    if(isset($_REQUEST[$name])){
        return true;
    }else{
        return false;
    }
}

//currentUri
function cuurentUri($path){
   return parse_url(trim($path,"/"),PHP_URL_PATH);
}

//add role check
function roleCheck($role_id,$checkRole){
    $check=User::build()->executeQuery("select role_name from role where role_id=$role_id LIMIT 1");
    $dbrole=$check[0]->role_name;
    if($dbrole===$checkRole){
        return true;
    }else{
        return false;
    }
}