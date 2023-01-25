<?php 

namespace Guest;

use model\User;

session_start();

class Guest{
    public static function check(){
        if(isset($_SESSION['user'])){
            return redirect('/');
        }
    }
}


