<?php 

namespace controller;

use Auth\Auth;
use csrfCheck;
use model\User;
use Validator\Validator;

class PasswordController{
    //middleware
    public function __construct()
    {
        Auth::check();
    }

    //redirect pw page
    public function passwordUpdatePage(){
        return view('password/passwordUpdate');
    }
    //update user password
    public function passwordUpdate(){
        csrfCheck::check();
        $id=$_SESSION['user'][0]->id;
        $old_password=$_POST['oldPassword'];
        $new_password=$_POST['newPassword'];
        $confirm_password=$_POST['confirmPassword'];
        $dbPassword=User::exists(['id'=>$id])[0]->password;
        Validator::requireValidation(
            [
                "oldPassword"=>$old_password,
                "newPassword"=>$new_password,
                "confirmPassword"=>$confirm_password,
            ],'/password/update/page?'
        );
        if($dbPassword){
            if($new_password===$confirm_password){
                $verify=password_verify($old_password,$dbPassword);
                if($verify){
                    $new_password=password_hash($new_password,PASSWORD_BCRYPT);
                    User::build()->update([
                        'password'=>$new_password
                    ],$id);
                    session_unset();
                    return redirect('/');
                }else{
                    return redirect('/password/update/page?oldPwWrong');
                }
            }else{     
                return redirect('/password/update/page?notMatch');
            }
        }else{
            return redirect('404');
        }
     }
}