<?php 

namespace controller;

use model\User;
use Guest\Guest;
use Validator\Validator;

class RegisterController{
    public function __construct()
    {
        Guest::check();
    }
    //direct to registerPage
    public function registerPage(){
        return view('register');
    }
    //process of register
    public function register(){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $password=$_POST['password'];
        // validation
        Validator::requireValidation(
            [
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
            ],'/register/page'
        );
        //email dulicate check
        $uniqueCheck=User::exists(['email'=>$email]);
        if($uniqueCheck){
            return redirect('/register/page?duplicateEmail');
        }
        $pdo=User::build()->create([
            "email"=>$email,
            "name"=>$name,
            "password"=>password_hash($password,PASSWORD_BCRYPT)
        ]);
        return redirect('/loginPage?success');
        
    }
}