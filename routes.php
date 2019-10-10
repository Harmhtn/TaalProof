<?php

if (!empty($router)) {
    $router->define( [

        '' => 'src/controllers/index.php',
        'login' => 'src/controllers/login.php',
        'account' => 'src/controllers/account.php',
        'video' => 'src/controllers/video.php'

    ]);
}