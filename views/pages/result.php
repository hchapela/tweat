<?php 
    // include '../controller/twitter.php';
    // include '../controller/nlu.php';
    include '../controller/meal.php';
    define('PUBLIC', 'http://localhost:8888/public/');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("../partials/head.php"); ?>
<body>
    <?php include("../partials/header.php"); ?>
    <div class="results container">
        <div class="nickname container"><span class="limon">@</span>Nickname <span class="icon-twitter"></span></div>
        <div class="charts container">
            <div class="graphics"></div>
            <ul class="numbers">
                <li class="result-number result-number-1"><span><? $_app->results ?></span><span class="light azul"> of the time in a </span><span class="semi-italic lemon">joy</span><span class="light azul"> mood.</span></li>
                <li class="result-number result-number-2"><span>10%</span><span class="light azul"> of the time in a </span><span class="semi-italic lemon">sadness</span><span class="light azul"> mood.</span></li>
                <li class="result-number result-number-3"><span>6%</span><span class="light azul"> of the time in a </span><span class="semi-italic lemon">fear</span><span class="light azul"> mood.</span></li>
                <li class="result-number result-number-4"><span>4%</span><span class="light azul"> of the time in a </span><span class="semi-italic lemon">disgust</span><span class="light azul"> mood.</span></li>
                <li class="result-number result-number-5"><span>16%</span><span class="light azul"> of the time in a </span><span class="semi-italic lemon">anger</span><span class="light azul"> mood.</span></li>
            </ul>
        </div>
        <div class="advice container">Today, you should eat <span class="lemon">...</span></div>
        <div class="meal container">
            <div class="meal-name">Hot dog</div>
            <div class="meal-image"></div>
        </div>
        <div class="interactions container">
            <a href="#" class="recipe btn-orange">See the recipe</a>
            <a href="#" class="share"><span class="icon-share"></span></a >
        </div>
    </div>
</body>
</html>