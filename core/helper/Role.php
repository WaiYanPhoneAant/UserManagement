<?php 

namespace Auth;

use model\User;



class Role{
    public static function checkAdmin(){
        if(isset($_SESSION['user'])){
            $role=$_SESSION['user'][0]->role;
            if($role ==1 || $role ==2){
                return;
            }else{
                dd('User Page');
            }
        }else{
            dd('out');
        }
    } 
}