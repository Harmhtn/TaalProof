<?php


class Connection
{
    public function __construct()
    {
        define('__ROOT__', dirname(dirname(dirname(__FILE__))));
        $db = require(__ROOT__ . "/config/config.php");


        $server_name = $db['server_name'];
        $db_name = $db['db_name'];
        $username = $db['username'];
        $password = $db['password'];

        try{
            $this->conn = new PDO("mysql:host=$server_name;dbname=$db_name", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch (PDOException $e) {
            $e->getMessage();
        }
    }
}