<?php 

?>
<!DOCTYPE html>
<html lang="en">
<?php include("../partials/head.php"); ?>
<title>Dooodle | log-in</title>
</head>
<body>
    <?php include("../partials/header.php"); ?>
    <div class='contact-ctn'>
        <span class='about-subtitle'>Log-in or register to be able to vote for your favorite dooodle !</span>
        <form action="#" method='post'>
            <div class='text-input-ctn'>
                <input class='text-input' type="text" placeholder='prénom.nom@hetic.net'>
                <div class='text-label'>
                    <span class='text-label-inner'>e-mail</span>
                </div>
            </div>
            <div class='text-input-ctn'>
                <input class='text-input' type="password" placeholder='adfafnFa'>
                <div class='text-label'>
                    <span class='text-label-inner'>Password</span>
                </div>
            </div>
            
            <div>
                <input class='submit-btn' type="submit" value="Register">
            </div>
        </form>
    </div>
</body>
</html>