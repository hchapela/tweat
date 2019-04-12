<!DOCTYPE html>
<html lang="en">
    <?php include (VIEWS."partials/head.php"); ?>
    <body>
        <?php include (VIEWS."partials/header.php"); ?>
        <div class="container main">
            <div class="spitch azul">Eat what you tweet<span class="limon">.</span></div>
            <?php include (VIEWS."partials/search.php"); ?>
        </div>
        <div class="illustrations">
            <div class="illu illu-1">
                <div class="illus illus-1"></div>
                <div class="shadows shadow-1"></div>
            </div>
            <div class="illu illu-2">
                <div class="illus illus-2"></div>
                <div class="shadows shadow-2"></div>
            </div>
            <div class="illu illu-3">
                <div class="illus illus-3"></div>
                <div class="shadows shadow-2"></div>
            </div>
        </div>
        <?php include (VIEWS.'partials/loader.php') ?>
        <?php //include (VIEWS."partials/footer_home.php"); ?>
    </body>
</html>