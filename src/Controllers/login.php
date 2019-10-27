<?php
$app['database'];

//if logout is clicked destroy the session
if($_SERVER['REQUEST_URI'] == '/logout'){
    session_destroy();
}

//load head and navbar
require 'Resources/views/head.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $login_name = $_POST['login_name'];
    $pass = $_POST['password'];

    $new_password = hash('sha256', $pass);
    $userinfo = $app['database']->login($login_name, $new_password);

    if (!$userinfo[0])
    {
        $message = true;
    }else {
        foreach ($userinfo[0] as $user)
        {

            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["role"] = $user["roles_role_id"];
        }
        //Provide the user with a login session.

        $_SESSION["logged_in"] = true;
        header('Location: /');
    }

}
//load view
    require 'Resources/views/default/login.view.php';




//load footer
require 'Resources/views/footer.php';