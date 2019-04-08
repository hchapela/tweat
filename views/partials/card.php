<?php

    include_once('../includes/database.php');

    // $query = $GLOBALS['pdo']->query("SELECT * FROM cards LIMIT 9");
    // $cards = $query->fetchAll();

?>
<div class="card">
    <div class="card-image">
        <img src="./medias/img/<?= $cards->image; ?>" class="card-image-drawing"/>
        <div class="card-image-share"></div>
    </div>
    <div class="card-desc">
        <div class="card-desc-info">
            <h3 class="card-desc-title"><!--<? $_cards->title ?>-->Dooodle my ass</h3>
            <p class="card-desc-date"><!--<? $_cards->date ?>-->05/04/2019</p>
        </div>
        <div class="card-desc-like"></div>
    </div>
</div>