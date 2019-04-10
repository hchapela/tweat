<?php

include 'twitter.php';
include 'nlu.php';
include 'meal.php';


class App {

    public function __construct() {
        $this->twitter = new Twitter();
        $this->tweets = $this->twitter->tweets;

        foreach ($this->tweets as $_tweet) {
            echo '<pre>';
            print_r($_tweet);
            echo '</pre>';
        }
    }
}


echo '<pre>';
print_r("run");
echo '</pre>';
