<?php

$app['database'];

//load head and navbar
require 'Resources/views/head.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login_name = $_POST['login_name'];
    $pass = $_POST['password'];

    $userinfo = $app['database']->login($login_name, $pass);


    if (!$userinfo)
    {
        echo "Geen account bekend met deze gegevens!";
    }else {
        foreach ($userinfo as $user)
        {
            $_SESSION["user_id"] = $user["user_id"];
        }
        //Provide the user with a login session.

        $_SESSION["logged_in"] = true;
        header('Location: /');
    }

}else{
//load view
    require 'Resources/views/default/login.view.php';
}



//load footer
require 'Resources/views/footer.php';