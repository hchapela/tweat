<?php 
include '../../controller/admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php include("../partials/head.php"); ?>
<title>Dooodle | admin</title>
</head>

<body>
    <?php include("../partials/header.php"); ?>
    <?php if(!$_admin) : ?>
        <div class="admin-wrapper">
            <?php include("../partials/form-admin.php"); ?>
            <div class='main-bg'></div>
        </div>
    <?php else : ?>
        <div class='connect'>
            <form action="./include/deconnect.php" method="post">
                <div>
                    <input class="submit-btn" type="submit" value="Disconnect">
                </div>
            </form>
        </div>
        <div class="all-msg-ctn">
            <?php foreach($messages as $_message): ?>
                <div class="message-ctn">
                    <div class="admin-info">
                        <span>00<?= $_message->id ?></span><br>
                        <span><?= $_message->mail ?></span><br>
                        <span><?= $_message->date ?></span>
                    </div>
                    <span class="admin-msg"><?= $_message->message ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>

</html>