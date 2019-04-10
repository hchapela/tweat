<?php

include 'twitter.php';
include 'nlu.php';
include 'meal.php';


class App {

    public function __construct() {
        // Number of tweets you want
        $this->maxTweets = 5;
        // Get Tweets then slice them
        $this->tweets = $this->getTweets();
        // Analyze on each Tweet
        $this->getAnalyze();
        $this->getMeal();
    }

    public function getTweets() {
        $this->twitter = new Twitter("Immersive_g");
        $this->tweets = $this->twitter->tweets;
        return array_slice($this->tweets, 0, $this->maxTweets);
    }

    public function getAnalyze() {
        // On each tweet analyze
        $this->nlu = new NaturalLanguageUnderstanding();
        $this->emotions = [];
        foreach ($this->tweets as $_tweet) {
            $emotion = $this->nlu->nlu($_tweet);
            array_push($this->emotions, $emotion);
        }
        // Find most present emotion in last tweets
        $this->mostEmotion = $this->countMostPresent($this->emotions);
    }

    public function getMeal() {
        $this->mealDB = new MealDB();
        $this->mealDB->newMeal($this->mostEmotion);
    }

    public function countMostPresent($array) {
        array_count_values($array);
        return $array[0];
    }
}