<?php 


namespace Validator;

use model\User;

class Validator{
    public static function requireValidation(Array $data,$route)
    {
        # code
        $filter=array_filter($data,fn($data) =>!trim($data) ); 
        $result=array_keys($filter);
        if($result){
            $error="?";
           foreach ($result as $r) {
                echo $r."<br>";
                $error.=$r."&";
           }
           $error=trim($error,"?");
           return redirect(trim($route.$error,"?"));
        }
        return ;
    }
    public static function uniqueValidation($table,Array $uniqueData)
    {    # code..

        foreach ($uniqueData as $dataKey => $dataValue) {
            # code...
            return $user=User::build()->executeQuery("SELECT email FROM $table WHERE $dataKey='$dataValue' ");
        }
        // 
    }

    
}