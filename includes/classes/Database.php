<?php

class Database{        

    const SELECTSINGLE = 1;
    const SELECTALL = 2;
    const EXECUTE = 3;
        
    private $pdo;

    public function __construct(){
        
        $pdo = new PDO("mysql:host=mysql-server;dbname=project", "root", "secret");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
    }

    //Add queryDB() here
    
}
    