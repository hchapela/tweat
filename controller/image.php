<?php
require 'simpleImage.php';

class newImage {
    public function __construct() {
        echo '<pre>';
        print_r("hey");
        echo '</pre>';
        $this->getTwitterImg("craftedbyhugo");
        // Create a new SimpleImage object
        // $image = new \claviska\SimpleImage();
        // $image
        //   ->fromFile('base.jpg')
        //   ->overlay('twitter.jpg', 'bottom left', 1, 0, 0)
        //   ->overlay('meal.jpg', 'bottom left', 1, 400, 0)
        //   ->toScreen();
    }

    public function getTwitterImg($_account) {
        $baseUrl = "https://twitter.com/".$_account."/profile_image?size=original";
        $ch = curl_init($baseUrl);
        $fp = fopen('./twitter.jpg', 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
}

$img = new newImage();
