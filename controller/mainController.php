<?php

namespace controller;


use Auth\Auth;
use Auth\Role;
use model\User;

class mainController{
    public function __construct()
    {
        Auth::check();
        Role::checkAdmin();
    }
    public function dashboard(){
        $query= "SELECT users.*,role_name ,role_id From users LEFT
        JOIN  role ON users.role=role.role_id";
        if(!isset($_REQUEST['search'])){
            $data=User::build()->quaryPrepare($query);
        }else{
            $serachKey=$_REQUEST['search'];
            if(!$serachKey==""){
                $query.=" where name LIKE '%$serachKey%' OR email LIKE '%$serachKey%'";
                $data=User::build()->quaryPrepare($query);
            }
        }
        return view('dashboard',['data'=>$data]);
    }

    public function userOnlyDashboard(){
        $this->userFilter('user');
    }
    public function adminsOnlyDashboard()
    {
        # code...
        $this->userFilter('admin');
    }
    public function moderatorsOnlyDashboard()
    {
        # code...
        $this->userFilter('moderator');
    }

    // filter function
    private function userFilter($role){
        $query= "SELECT users.*,role_name ,role_id From users LEFT
        JOIN  role ON users.role=role.role_id WHERE role.role_name='$role'";
            if(!isset($_REQUEST['search'])){
                $data=User::build()->quaryPrepare($query);
            }else{
                $serachKey=$_REQUEST['search'];
                if(!$serachKey==""){
                    $query.="AND name LIKE '%$serachKey%'";
                    $data=User::build()->quaryPrepare($query);
                }
            }
        return view('dashboard',['data'=>$data,'page'=>$role]);
    }
    public function create(){
        $pdo=User::build()->create([
            "email"=>$_REQUEST['email'],
            "name"=>$_REQUEST['name'],
            "address"=>$_REQUEST['address'],
            "password"=>$_REQUEST['password']
        ]);
        return redirect('/');
    }
}