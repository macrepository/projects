<?php

class config{

    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database1 = 'database1';
    protected $database2 = 'database2';

    public function getHost(){
        return $this->host;
    }
    public function getUser(){
       return $this->user; 
    }

    public function getPassword(){
       return $this->password; 
    }

    public function getDatabase1(){
        return $this->database1; 
     }
 
     public function getDatabase2(){
        return $this->database2; 
     }
}