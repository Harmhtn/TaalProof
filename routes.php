<?php

if (!empty($router)) {
    $router->define( [

        '' => 'src/controllers/index.php',
        'login' => 'src/controllers/login.php',
        'logout' => 'src/controllers/login.php',
        'register' => 'src/controllers/register.php',
        'account' => 'src/controllers/account.php',
        'admin' => 'src/controllers/admin.php',
        'forgot_password' => 'src/controllers/forgot_password.php',
        'watch/video' => 'src/controllers/watch_video.php',
        'video' => 'src/controllers/video.php'

    ]);
}