<?php

class Database {

    public $db;
    function __construct(){

        //Check Connection Database
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=shopside;charset=utf8', 'root' , '');
        }catch (PDOException $e){
            echo $e->getMessage();
            die();
        }

    }
}