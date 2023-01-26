<?php


namespace controller;

use csrfCheck;

class logoutController{

    //direct to login page
    public function logout(){
        csrfCheck::check();
        session_unset();
        return redirect('/loginPage');
    }
}