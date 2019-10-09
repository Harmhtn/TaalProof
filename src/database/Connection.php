<?php


class Connection
{
    public static function make($config)
    {

        try{
            return new PDO(
                'mysql:host=' . $config['server_name'] . ';dbname=' . $config['db_name'] . '',
                $config['username'],
                $config['password'],
                $config['options']
            );
        }catch(PDOException $e){
            echo"<pre>";
            print_r( $e->getMessage());
            exit;

        }
    }
}