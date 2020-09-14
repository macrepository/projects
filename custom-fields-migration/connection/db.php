<?php

class db extends config{

    public function conn($host, $database, $user, $password){
        return new PDO("mysql:host=$host;dbname=database1", $user, $password);
    }

    public function query($sql, $data, $transaction, $database){
        try{
            $conn = $this->conn($this->getHost(), $database, $this->getUSer(), $this->getPassword());
            $pre = $conn->prepare($sql);
            $pre->setFetchMode(PDO::FETCH_ASSOC);
            $res = $pre->execute($data);
            if($transaction == 'select'){
                $res = $pre->fetchAll();
            }
            $conn = null;
            return $res;
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
}   