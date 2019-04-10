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
    }

    public function getTweets() {
        $this->twitter = new Twitter("realDonaldTrump");
        $this->tweets = $this->twitter->tweets;
        return array_slice($this->tweets, 0, $this->maxTweets);
    }

    public function getAnalyze() {
        // On each tweet analyze
        $this->nlu = new NaturalLanguageUnderstanding();
        foreach ($this->tweets as $_tweet) {
            $this->nlu->nlu($_tweet);
        }
    }
}