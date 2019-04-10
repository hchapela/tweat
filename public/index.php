<?php 
    // include '../controller/app.php';
    // $app = new App();

    // define('PUBLIC', 'http://localhost:8888/public/');
    define('VIEWS', '../views/');
        
    // Configuration

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
?>