<?php 
    // include '../controller/twitter.php';
    // include '../controller/nlu.php';
    include '../controller/meal.php';
    define('PUBLIC', 'http://localhost:8888/public/');
    define('VIEWS', '../views/');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include(VIEWS."partials/head.php"); ?>
<body>
    <?php include(VIEWS."partials/header.php"); ?>
    <div class="container main">
        <div class="spitch azul">Eat what you tweet<span class="limon">.</span></div>
        <?php include(VIEWS."partials/search.php"); ?>
    </div>
    <?php include(VIEWS."partials/footer.php"); ?>
</body>
</html>