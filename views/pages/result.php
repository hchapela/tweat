<?php 
    // include '../controller/twitter.php';
    // include '../controller/nlu.php';
    include '../controller/meal.php';
    define('PUBLIC', 'http://localhost:8888/public/');
?>
<!DOCTYPE html>
<html lang="en">
    <?php //include("../partials/head.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweat.</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Arbutus+Slab|Montserrat:300,700|Source+Sans+Pro:300,400,600,600i,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../public/assets/styles/style.css">
</head>
<body>
    <?php include("../partials/header.php"); ?>
    <div class="results container">
        <div class="nickname azul"><span class="limon">@</span>Nickname<a href="#" class="icon-twitter"></a></div>
        <div class="charts">
            <div class="graphics">
                <div class="graphics-bars graphics-bars-1"></div>
                <div class="graphics-bars graphics-bars-2"></div>
                <div class="graphics-bars graphics-bars-3"></div>
                <div class="graphics-bars graphics-bars-4"></div>
                <div class="graphics-bars graphics-bars-5"></div>
            </div>
            <ul class="numbers">
                <li class="result-number result-number-1"><span class="percent semi azul">64% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">joy</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-2"><span class="percent semi azul">10% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">sadness</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-3"><span class="percent semi azul">6% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">fear</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-4"><span class="percent semi azul">4% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">disgust</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-5"><span class="percent semi azul">16% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">anger</span><span class="phrase light azul"> mood.</span></li>
            </ul>
        </div>
        <div class="advice title azul">Today, you should eat <span class="limon">...</span></div>
        <div class="meal">
            <div class="meal-name big-title azul text-center">Hot dog</div>
            <div class="meal-image"></div>
        </div>
        <div class="interactions">
            <a href="#" class="btn-orange">See the recipe</a>
            <a href="#" class="share"><span class="icon-share"></span></a >
        </div>
    </div>
    <?php include(VIEWS."partials/footer.php"); ?>
</body>
</html>