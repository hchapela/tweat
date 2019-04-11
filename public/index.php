<?php

    // Configuration
    // define('SITEURL', 'http://localhost:8888/tweat/');
    define('VIEWS', '../views/');
    define('SITEURL', './');

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
    else if ($q == 'about')
    {
        $controller = 'about';
    }
    else if ($q == 'contact')
    {
        $controller = 'contact';
    }

    include '../controller/'.$controller.'.php';
