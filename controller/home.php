<?php

session_start();

include 'app.php';
// Couldn't finish image creation with imagemagick
// include 'image.php';
include 'form-handler.php';

$title = 'Tweat.';



include '../views/pages/home.php';

