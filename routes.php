<?php

if (!empty($router)) {
    $router->define( [

        '/' => 'src/Controllers/index.php',
        'login' => 'src/Controllers/login.php',
        'logout' => 'src/Controllers/login.php',
        'register' => 'src/Controllers/register.php',
        'account' => 'src/Controllers/account.php',
        'admin' => 'src/Controllers/admin.php',
        'forgot_password' => 'src/Controllers/forgot_password.php',
        'watch/video' => 'src/Controllers/watch_video.php',
        'video' => 'src/Controllers/video.php'

    ]);
}