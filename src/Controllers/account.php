<?php
//load head and navbar
require 'Resources/views/head.php';


$user_info = $app['database']->selectUserById($_SESSION["user_id"]);

if(isset($_GET['change'])) {

    $username = $_POST['user_name'];
    $login_name = $_POST['login_name'];
    $user_email = $_POST['user_email'];
    $id = $_SESSION['user_id'];
    $app['database']->updateUser($username, $login_name, $user_email, $id);


}

//load view
require 'Resources/views/default/account.view.php';

//load footer
require 'Resources/views/footer.php';