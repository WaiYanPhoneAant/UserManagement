<?php 

namespace db;

use PDO;
use PDOException;

class connection{
    private static $connection;
    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpassword;
    
    protected function __construct(Array $config)
    {   
        $this->dbhost=$config['dbhost'];
        $this->dbname=$config['dbname'];
        $this->dbuser=$config['dbuser'];
        $this->dbpassword=$config['dbpassword']; 
                    
    }

    //build connection class
    public static function make(Array $config){
        if(!self::$connection instanceof connection){
            self::$connection=new connection($config);
        }
        return self::$connection;
    }

    //pdo connection
    public function connectPDO(){
        try {
            return $pdo=new PDO(
               "mysql:host=$this->dbhost;
                dbname=$this->dbname",
               $this->dbuser,
               $this->dbpassword,
           );
           $pdo->prepare('select * from users');
           
       } catch (PDOException $e) {
           echo $e;
       }
    }

    
}











