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
    public function userProfileUpdatePage(){
        $user=User::exists(['id'=>$_SESSION['user'][0]->id]);
        if($user){
            return view('updateUserData',['data'=>$user]);
        }else{
            return redirect('/404');
        }
        return view('updateUserData',$user);
    }

    //update Login user data  
    public function userProfileUpdate(){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $data=[
            'name'=>$name,
            'email'=>$email,
            'update_at'=>Carbon::now("Asia/Yangon")
        ];
        $id=$_SESSION['user'][0]->id;
        $this->validateUpdate($data,$id,'/user/profile/update/page?');
        $address=$_POST['address'];
        $data['address']=$address;
        $d=User::build()->update($data,$id,'session');
        return redirect('/user/profile/update/page?success');

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