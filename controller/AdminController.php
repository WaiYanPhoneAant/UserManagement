<?php 

namespace controller;

use Auth\Auth;
use Auth\Role;
use csrfCheck;
use model\User;
use Carbon\Carbon;
use Validator\Validator;




class AdminController{
    //middle ware
    public function __construct()
    {
        Auth::check();
        Role::checkAdmin();
    }

    //update Login user data update 
    public function updateLoginUserData(){
        csrfCheck::check();
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


    //direct user update page from admin
    public function AdminUpdateUserDataPage(){
        $this->currentRoleCheck();
        $id=$_GET['user'];
        $user=User::exists(['id'=>$id]);
        if($user){
            return view('updateUserData',['data'=>$user]);
        }else{
            return redirect('/404');
        }
        
    }

    //update user data from admin
    public function AdminUpdateUserData(){

        csrfCheck::check();
        $this->currentRoleCheck();
        $id=$_POST['userId'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $role=$_POST['role'];
        $data=[
            'name'=>$name,
            'email'=>$email,
            'update_at'=>Carbon::now("Asia/Yangon")
        ];
        $this->validateUpdate($data,$id,"/admin/user/update/page?user=$id&");
        $data['role']=$role;
        $address=$_POST['address'];
        $data['address']=$address;
        $d=User::build()->update($data,$id);
        return redirect("/admin/user/update/page?user=$id&success");
    }


    //validation for update
    private function validateUpdate($data,$id,$route){
        Validator::requireValidation($data,$route);
        $uniqueCheck=User::exists(['email'=>$data['email']],$id);
        if($uniqueCheck){
            return redirect($route."duplicateEmail");
        }
    }


    //user account delete
    public function userDelete(){
        csrfCheck::check();
        $this->currentRoleCheck();
        $id=$_POST['userId'];
        if($id != $_SESSION['user'][0]->id){
            User::build()->executeQuery("Delete from users where id=$id");
            return redirect('/');
        }else{
            redirect('/404');
        }
    }   
    private function currentRoleCheck(){
        $session=$_SESSION['user'][0];
        if(roleCheck($session->role,'admin')){
            return;
        }else{
            return redirect('/');
        }
    }

}