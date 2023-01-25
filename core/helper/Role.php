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
                return redirect('/user/profile');
            }
        }else{
            dd('out');
        }
    } 
    public static function checkUser(){
        if(isset($_SESSION['user'])){
            $role=$_SESSION['user'][0]->role;
            if($role ==1 || $role ==2){
                return redirect('/');
            }else{
               return;
            }
        }else{
            dd('out');
        }
    } 
}