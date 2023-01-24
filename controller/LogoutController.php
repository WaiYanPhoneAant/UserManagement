<?php


namespace controller;

class logoutController{

    //direct to login page
    public function logout(){
        session_start();
        session_unset();
        return redirect('/loginPage');
    }
}