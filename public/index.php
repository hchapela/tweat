<?php

    // Configuration
    // define('SITEURL', 'http://localhost:8888/tweat/');
    define('VIEWS', '../views/');
    define('SITEURL', '/tweat/');

    // Routing
    $q = !empty($_GET['q']) ? $_GET['q'] : 'home';

    $controller = '404';

    if ($q == 'home')
    {
        $controller = 'home';
    }
    else if ($q == 'result')
    {
        $controller = 'result';
    }

    include '../controller/'.$controller.'.php';
