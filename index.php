<?php
require 'src/bootstrap.php';
session_start();

if(isset($_SESSION["logged_in"]) != true) {

    if ($_SERVER['REQUEST_URI'] == '/register' ||
        $_SERVER['REQUEST_URI'] == '/login' ||
        $_SERVER['REQUEST_URI'] == '/forgot/password'){

        require Router::load('routes.php')
            ->direct(Request::uri());

    }else{
        $_SERVER['REQUEST_URI'] = '/login';

        require Router::load('routes.php')
            ->direct(Request::uri());

    }


}

