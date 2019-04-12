<?php

include 'twitter.php';
include 'nlu.php';
include 'translate.php';
include 'meal.php';


class App {

    public $_account;

    public function __construct($_account) {
        $this->account = $_account;
        // Kanye west likes fish sticks
        if($this->account === "" || $this->account === "@" || $this->account === "44") {
            header("Refresh:0");
        }
        // SPOILER , THIS IS AN EASTER EGG
        else if ($this->account === "kanyewest" || $this->account === "@kanyewest") {
            // Get json
            $string = file_get_contents("../config/ingredients.json");
            $string = json_decode($string, true);

            // Number of tweets you want
            $this->maxTweets = 5;
            // Get Tweets then slice them
            $this->tweets = $this->getTweets();

            // Analyze on each Tweet
            $this->getAnalyze();

            $_SESSION['emotions'] = $this->allEmotions;
            $_SESSION['account'] = $this->account;
            $this->meal = $string['kanyewest'];
            $_SESSION['strMeal'] = $this->meal['strMeal'];
            $_SESSION['strYoutube'] = $this->meal['strYoutube'];
            $_SESSION['strMealThumb'] = $this->meal['strMealThumb'];

        } else {
            // Number of tweets you want
            $this->maxTweets = 5;
            // Get Tweets then slice them
            $this->tweets = $this->getTweets();
            // Analyze on each Tweet
            $this->getAnalyze();
            $this->getMeal();
            $this->sendSession();
        }
        header("Location: ./result");
    }

    public function getTweets() {
        $this->twitter = new Twitter($this->account);
        $this->tweets = $this->twitter->tweets;
        return array_slice($this->tweets, 0, $this->maxTweets);
    }

    public function getAnalyze() {
        // On each tweet analyze
        $this->nlu = new NaturalLanguageUnderstanding();
        $this->translate = new Translate();
        $this->emotions = [];
        // Use for datavisualisation
        $this->allEmotions = [0,0,0,0,0];
        $this->iterations = 0;
        foreach ($this->tweets as $_tweet) {
            // Identify language
            $lang = $this->translate->identifyLanguage($_tweet);
            // If not english then translate to english
            if ($lang !== "en") {
                $format = $lang."-en";
                $_tweet = $this->translate->translateText($_tweet, $format);
            }
            // Analyze tweet in english

            $newEmotions = $this->nlu->nlu($_tweet);

            if($newEmotions !== "not emotion") {
                $emotion = $this->nlu->getAverage($newEmotions);
                // Prepare for calcul of datavisualisation
                $newEmotions = ($newEmotions->emotion->document->emotion);
                $newEmotions = (array) $newEmotions;
                $this->allEmotions = $this->nlu->addNewEmotions($newEmotions, $this->allEmotions);
                $this->iterations++;
                // Push for meal request
                array_push($this->emotions, $emotion);
            }
        }

        $this->allEmotions = $this->nlu->calculateDatas($this->allEmotions, $this->iterations);
        // Find most present emotion in last tweets
        if(empty($this->emotions)) {
            // Default emotion
            $this->mostEmotion = "sadness";
        } else {
            $this->mostEmotion = $this->countMostPresent($this->emotions);
        }
    }

    public function getMeal() {
        $this->mealDB = new MealDB();
        $this->meal = $this->mealDB->newMeal($this->mostEmotion);
    }

    public function countMostPresent($array) {
        $values = array_count_values($array);
        arsort($values);
        $popular = array_slice(array_keys($values), 0, 5, true);
        return $popular[0];
    }

    // Create session with variables
    public function sendSession() {
        $_SESSION['emotions'] = $this->allEmotions;
        $_SESSION['account'] = $this->account;
        $this->meal = $this->meal->meals[0];
        $_SESSION['strMeal'] = $this->meal->strMeal;
        $_SESSION['strYoutube'] = $this->meal->strYoutube;
        $_SESSION['strMealThumb'] = $this->meal->strMealThumb;
    }
}