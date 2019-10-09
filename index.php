<?php

require 'src/bootstrap.php';


require Router::load('routes.php')
    ->direct(Request::uri());