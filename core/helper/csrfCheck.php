<?php 

use Carbon\Carbon;




class csrfCheck{
    public static function active(){
        $csrftoken=(md5($_SESSION['user'][0]->id));
        $_SESSION['csrf']=$csrftoken;
        return;
    }
    public static function check(){
        if($_SESSION['csrf']==md5($_SESSION['user'][0]->id)){
            unset($_SESSION['csrf']);
            return;
        }else{
            return redirect('/404');
        }
    }
    
}


