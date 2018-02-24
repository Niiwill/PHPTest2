<?php
class Database extends MySQLi {
     private static $instance = null ;

     private static $host="127.0.0.1";
     private static $username="root";
     private static $password="";
     private static $db="quantox";

     private function __construct($host, $user, $password, $database){ 
         parent::__construct($host, $user, $password, $database);
     }

     public static function getInstance(){

         if (self::$instance == null){
             self::$instance = new self(self::$host,self::$username,self::$password,self::$db);
         }
         return self::$instance ;
     }
}


class Session{

    // Is User Logged
    public static function isLogin(){

        if (isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }

    // Add session for authenticaton
    public static function add($user){
        $_SESSION["user_id"] = $user;
        return true;
    }

}

?>