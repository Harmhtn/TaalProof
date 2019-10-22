<?php

//load head and navbar
require 'Resources/views/head.php';


if (isset($_POST['email_send'])) {

    //check if email exists in db
    $email_login = $_POST['email'];

    $user_info = $app['database']->selectIfEmailLoginExists($email_login);


    if ($user_info != Null) {
        //set token and send email with token
        $length = 40;
        $token = bin2hex(random_bytes($length));
        $app['database']->addToken($token, $user_info['user_email']);

        require_once "vendor/pear/mail/Mail.php";

        $host = "";
        $username = "";
        $password = "";
        $port = '';

        $from = 'example@example.nl';
        $to = $user_info['user_email'];
        $subject = "yes yes";

        $body = "je hebt recent aangevraagt om uw wachtwoord te veranderen. 
                Klik op de volgende link om uw wachtwoord opnieuw in te stellen 
                http://localhost:8000/forgot_password?token={$token}";
        $headers = array('From' => $from,
            'To' => $to,
            'Subject' => $subject);
        $smtp = Mail::factory('smtp',
            array('host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password));
        $smtp = Mail::factory('smtp',
            array('host' => $host,
                'auth' => true,
                'username' => $username,
                'password' => $password));

        try {
            $mail = $smtp->send($to, $headers, $body);

        } catch (PEAR_Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());
            exit;
        }
    echo "Er is een mail verstuurd naar het email adress controlleer ook uw spam box";

    } else {
        echo "Dit email adress staat niet geregistreerd";
    }


}
elseif (isset($_GET['token'])) {
    $result = $app['database']->checkToken($_GET['token']);
    if ($result != ''){

        //get date now and check if more then ten minutes past
        $date = date("Y-m-d H:i:s");
        $authentication_date = $result['authentication_date'];
        $authentication_date = new DateTime($authentication_date);
        $new_date = $authentication_date->modify('+10 minutes');

        if ($date <= $new_date->format('Y-m-d H:i:s') ) {

            require 'Resources/views/default/enter_new_pass.view.php';
            $app['database']->resetToken($_GET['token'], $result['user_id']);

            $app['database']->resetToken($_GET['token'], $result['user_id']);
        }
    }else{
        $error = "Authenticatie token is Helaas verlopen";
        require 'Resources/views/default/forgot_password.view.php';
    }

}
elseif (isset($_GET['newpass'])) {
    $new_password = hash('sha256', $_POST['new_password']);
    $app['database']->updatePassword($new_password, $_GET['newpass']);

    header('Location: /login');
}
else {

//load view
    require 'Resources/views/default/forgot_password.view.php';
}


//load footer
require 'Resources/views/footer.php';