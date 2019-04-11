<?php

$title = 'Tweat.';

session_start();

$emotions = array();

foreach ($_SESSION['emotions'] as $emotion => $value) {
    $value = round($value * 100);
    array_push($emotions, $value);
}

$account = $_SESSION['account'];

if($account[0] === "@") {
    $account = substr($account, 1);
}

include '../views/pages/result.php';

session_destroy();