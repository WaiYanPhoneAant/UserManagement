<?php 

namespace Auth;

use model\User;
session_start();


class Auth{
    public static function check(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }else{
            redirect('/loginPage');
        }
    }
    public static function authByEmailAndPassword(string $table,string $email,string $password){
        $user=User::build()->quaryPrepare("SELECT * FROM $table WHERE email='$email' "); 
        $hashPassword=$user[0]->password;
        if($hashPassword){
            if(password_verify($password, $hashPassword)) {
                return $user;
                exit();
            } else {
                return false;
            }
        }  
        return false;
    }
    
}


