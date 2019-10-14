<?php

if (!empty($router)) {
    $router->define( [

        '' => 'src/controllers/index.php',
        'login' => 'src/controllers/login.php',
        'logout' => 'src/controllers/login.php',
        'register' => 'src/controllers/register.php',
        'account' => 'src/controllers/account.php',
        'forgot/password' => 'src/controllers/forgot_password.php',
        'video' => 'src/controllers/video.php'

    ]);
}