<?php

//load head and navbar
require 'Resources/views/head.php';

$flevo = $app['database'];
//$cities = $flevo->getCities();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    //alle $_POST values
    $user_name = $_POST['user_name'];
    $login_name = $_POST['login_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $last_updated = new DateTime();
    $last_updated_date = $last_updated->format('Y-m-d H:i:s');



//inloggen om te checken of de gebruiker al bestaat
    if ($flevo->login($login_name, $user_password))
    {
        echo "Er bestaat al een account met deze email";
        echo '<a href="login">, keer terug naar loginscherm</a>';

    }
    else
    {
        $new_password = hash('sha256', $user_password);
        // functie aanroepen om gebruiker te maken
        $flevo->register($user_name, $login_name, $user_email, $user_password, $last_updated_date);
        echo "Gelukt! Het account is aangemaakt";
        echo '<a href="login">, keer terug naar loginscherm</a>';
    }

}else
{
    require 'Resources/views/default/register.view.php';
}

//load footer
require 'Resources/views/footer.php';