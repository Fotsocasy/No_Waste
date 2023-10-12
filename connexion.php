<?php

class connect extends PDO{ 

    const HOST="localhost";
    const DB="nowaste";
    const USER="root";
    const PSW="";

    public function __construct(){
        try {
            parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST,self::USER);
            // echo "DONE";
        } catch (PDOException $e) {
            echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
        }
    }
}

