<?php 

class Database {
    private $host = "192.168.20.10";
    private $database_name = "mytheresa";
    private $username = "userDB";
    private $password = "pwdDB";
    
    public $conn;
    
    public function getConnection(){
        
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