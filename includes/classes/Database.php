<?php

class Database{        

    const SELECTSINGLE = 1;
    const SELECTALL = 2;
    const EXECUTE = 3;
        
    private $pdo;

    public function __construct(){
        
        $this->pdo = new PDO("mysql:host=mysql-server;dbname=project", "root", "secret");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }

    public function queryDB($sql,$mode,$values = []){
        $stmt = $this->pdo->prepare($sql);

        foreach($values as $valueToBind){
            $stmt->bindValue($valueToBind[0], $valueToBind[1]);
        }

        $stmt->execute();

        if ($mode!= Database::SELECTSINGLE && $mode!= Database::SELECTALL && $mode!= Database::EXECUTE){
            throw new Exception('Invalid Mode');
        }elseif ($mode == Database::SELECTSINGLE){
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }elseif ($mode == Database::SELECTALL){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }

}
    