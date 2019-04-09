<?php 

?>
<!DOCTYPE html>
<html lang="en">
<?php include("../partials/head.php"); ?>
<title>Dooodle | contact</title>
</head>
<body>
    <?php include("../partials/header.php"); ?>
    <div class='contact-ctn'>
        <span class='contact-title'>Contact us</span>
        <form action="#" method='post'>
            <div class='text-input-ctn'>
                <input class='text-input' type="text" placeholder='prénom.nom@hetic.net'>
                <div class='text-label'>
                    <span class='text-label-inner'>e-mail</span>
                </div>
            </div>
            <div class='text-input-ctn'>
                <textarea rows="4" cols="50" class='area-input' placeholder='Dit nous tout ce qui te passe dans ta tête'></textarea>
                <div class='text-label-area'>
                    <span class='text-label-inner'>Ton p'tit message</span>
                </div>
            </div>
            <div>
                <input class='submit-btn' type="submit" value="Send your love">
            </div>
        </form>
    </div>
    <?php include(VIEWS."partials/footer.php"); ?>
</body>
</html>