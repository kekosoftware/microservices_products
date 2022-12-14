<?php 

class Database 
{    
    private $host;
    private $database_name;
    private $username;
    private $password;
    
    public $conn;

    public function __construct() 
    {
        $this->host = "192.168.20.10";
        $this->database_name = "mytheresa";
        $this->username = "userDB";
        $this->password = "pwdDB";
    }
    
    public function getConnection()
    {    
        $this->conn = null;
        
        try {
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->database_name, 
                                    $this->username, 
                                    $this->password
                                );
            $this->conn->exec("set names utf8");
            
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        
        return $this->conn;
    }
}  