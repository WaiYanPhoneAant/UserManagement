<?php 

namespace Guest;

use model\User;

class Guest{
    public static function check(){
        if(isset($_SESSION['user'])){
            return redirect('/');
        }
    }
}


