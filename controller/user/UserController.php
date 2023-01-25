<?php 

namespace controller;

use Auth\Auth;
use Auth\Role;
use model\User;
use Carbon\Carbon;
use Validator\Validator;
use controller\AdminController;




class UserController{
    //middle ware
    public function __construct()
    {
        Auth::check();
        role::checkUser();
    }
    //login user profile
    public function userProfile(){
        return view('user/User');
    }
    //update Login user data update 
    public function userProfileUpdate(){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $data=[
            'name'=>$name,
            'email'=>$email,
            'update_at'=>Carbon::now("Asia/Yangon")
        ];
        $id=$_SESSION['user'][0]->id;
        $this->validateUpdate($data,$id,'/?');
        $address=$_POST['address'];
        $data['address']=$address;
        $d=User::build()->update($data,$id,'session');
        return redirect('/?success');

    }

    //validation for update
    private function validateUpdate($data,$id,$route){
        Validator::requireValidation($data,$route);
        $uniqueCheck=User::exists(['email'=>$data['email']],$id);
        if($uniqueCheck){
            return redirect($route."duplicateEmail");
        }
    }

}