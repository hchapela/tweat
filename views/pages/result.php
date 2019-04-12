<!DOCTYPE html>
<html lang="en">
    <?php include(VIEWS."partials/head.php"); ?>
<body>
    <?php include(VIEWS."partials/header.php"); ?>
    <div class="results container">
        <div class="nickname azul"><span class="limon">@</span><?= $account?><a href="<?="https://twitter.com/".$account?>" class="icon-twitter"></a></div>
        <div class="advice title azul">Today, you should eat <span class="limon">...</span></div>
        <div class="meal">
            <div class="meal-name big-title azul"><?=$_SESSION['strMeal']?></div>
            <div class="meal-image" style="background-image: url('<?= $_SESSION['strMealThumb'] ?>')"></div>
        </div>
        <div class="interactions">
            <a href="<?=$_SESSION['strYoutube']?>" target="_blank" class="btn-orange">See the recipe</a>
            <div class="share"><span class="icon-share"></span></div>
        </div>
        <div class="charts">
            <div class="graphics">
                <div style="width:<?=$emotions[0]?>%;" class="graphics-bars graphics-bars-1"></div>
                <div style="width:<?=$emotions[1]?>%;" class="graphics-bars graphics-bars-2"></div>
                <div style="width:<?=$emotions[2]?>%;" class="graphics-bars graphics-bars-3"></div>
                <div style="width:<?=$emotions[3]?>%;" class="graphics-bars graphics-bars-4"></div>
                <div style="width:<?=$emotions[4]?>%;" class="graphics-bars graphics-bars-5"></div>
            </div>
            <ul class="numbers">
                <li class="result-number result-number-2"><span class="percent semi azul"><?= $emotions[0]?>% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">sadness</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-1"><span class="percent semi azul"><?= $emotions[1]?>% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">joy</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-3"><span class="percent semi azul"><?= $emotions[2]?>% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">fear</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-4"><span class="percent semi azul"><?= $emotions[3]?>% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">disgust</span><span class="phrase light azul"> mood.</span></li>
                <li class="result-number result-number-5"><span class="percent semi azul"><?= $emotions[4]?>% </span><span class="phrase light azul">of the time in a </span><span class="semi-italic orange">anger</span><span class="phrase light azul"> mood.</span></li>
            </ul>
        </div>
    </div>
    <?php include (VIEWS.'partials/modale.php') ?>
    <?php include (VIEWS."partials/footer.php"); ?>
</body>
</html>