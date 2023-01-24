<?php

namespace db\query;

use PDO;
use db\connection;


trait QueryBuilder{ 

    public $pdo;
    static $QueryBuilder = null;
   
    protected function __construct()
    {
        $config=require "./config.php";
        $pdo=connection::make($config['database'])->connectPDO();
        $this->pdo=$pdo;
    }

    //build QueryBuilder class
    public static function build()
    {
        if(!static::$QueryBuilder) {
            self::$QueryBuilder = new static;
        }
        return self::$QueryBuilder;
    }

    // get all Data from database
    public function getAll(){
        return  $this->quaryPrepare("select * from $this->table");
    }

    //search data from database
    public static function exists(Array $uniqueData)
    {    # code..
        $pdo=static::build();
        foreach ($uniqueData as $dataKey => $dataValue) {
            # code...
             $user=$pdo->quaryPrepare("SELECT email FROM $pdo->table WHERE $dataKey='$dataValue' ");
        }
       return $user;
    }

    // data Creation
    public function create(Array $dataArr){
        $getDataKeys=array_keys($dataArr);
        $cols=implode(",",$getDataKeys);
        $questionmark='';
        foreach($getDataKeys as $key){
          $questionmark.="?,";
        }
        $questionmark=rtrim($questionmark,",");
        $sql="insert into $this->table ($cols) values ($questionmark)";
        $statement=$this->pdo->prepare($sql);
        $getDataValues=array_values($dataArr);
        $statement->execute($getDataValues);
    }



    //data update
    public function update(Array $data,$id){
        $queryData='';
        foreach ($data as $dataKey =>$dataValue) {
            $queryData.=$dataKey."="."'$dataValue',";
        }
        $queryData=rtrim($queryData,',');
        $sql="UPDATE $this->table SET ".$queryData. " where id='$id' " ;
        $this->quaryPrepare($sql);
    }

    // raw queryCreation
    public function quaryPrepare($query){
        $pdo=$this->pdo;
        $stm=$pdo->prepare($query);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    
}