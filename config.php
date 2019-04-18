<?php

class Database {

    //Params DB
    private $host = 'localhost';
    private $db_name = 'quide';
    private $port = '3306';
    private $password = '';
    private $username = 'root';
    private $conn;

    //Connection DB
    public function connect(){
        $this->conn = null;

        try{
            $this->conn = new PDO('mysql:host='.$this->host .';port='.$this->port .';dbname='.$this->db_name.'',
            $this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo 'Erreur de Connection:' . $e->getMessage();
        }

        return $this->conn;
    }

}
