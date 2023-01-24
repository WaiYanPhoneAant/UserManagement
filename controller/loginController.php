<?php

namespace controller;
use Auth\Auth;
use Guest\Guest;
use model\Post;
use model\User;

class loginController{
    public function __construct()
    {
        Guest::check();
    }
    //direct to login page
    public function loginPage(){
       
        return view('login');
    }

    //login process
    public function login(){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $auth=Auth::authByEmailAndPassword('users',$email,$password);
        if(!$auth){
            return redirect('/loginPage?error=0');
        }
        $_SESSION['user']=$auth;
        return redirect('/');
    }
}

