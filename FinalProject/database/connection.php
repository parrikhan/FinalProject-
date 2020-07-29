<?php
 class connection{
     private $server = "localhost";
     private $database ="food";
     private $username = "root";
     private $password = "";

    public $connect;
    protected function connected()
    {
        if(!isset($this->connect))
        {
            $this->connect = new mysqli($this->server,$this->username,$this->password,$this->database);
            // echo "Connection has been created successfully";
        }
        else
        {
            echo "Error occur";
        }
    }
 }
 ?>