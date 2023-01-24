<?php 

namespace controller;

use Auth\Auth;
use Auth\Role;
use model\User;
use Carbon\Carbon;
use Validator\Validator;




class UserController{
    public function __construct()
    {
        Auth::check();
        Role::checkAdmin();
    }
    public function updateUserData(){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $data=[
            'name'=>$name,
            'email'=>$email,
            'update_at'=>Carbon::now("Asia/Yangon")
        ];
        Validator::requireValidation($data,'/');
        User::build()->update($data,$_SESSION['user'][0]->id);
    }
    public function userDelete(){
        $id=$_POST['userId'];
        if($id != $_SESSION['user'][0]->id){
            User::build()->quaryPrepare("Delete from users where id=$id");
            return redirect('/');
        }else{
            redirect('/404');
        }
       
    }

   

}