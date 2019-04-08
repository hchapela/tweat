<?php

require "../vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter {
    public function __construct() {
        $this->auth= $this->twitterOAuthentification();
        $this->response = $this->twitterRequest();
        $this->tweets = $this->getTweets();

        echo '<pre>';
        print_r($this->tweets);
        echo '</pre>';
    }

    public function twitterOAuthentification() {
        $oauth = new TwitterOAuth(
            "xpRhGfmHTxPqO7K6DbkteUGWf",
            "T3wPI0GCI4yyPYx6rBIB74wtg59sd9Th0xWkNEqtlIG496n5Gh"
            );
        $accessToken = $oauth->oauth2('oauth2/token', ['grant_type' => 'client_credentials']);
        $twitter = new TwitterOAuth(
            "xpRhGfmHTxPqO7K6DbkteUGWf",
            "T3wPI0GCI4yyPYx6rBIB74wtg59sd9Th0xWkNEqtlIG496n5Gh",
            null,
            $accessToken->access_token
        );
        return $twitter;
    }
    
    public function twitterRequest() {
        $tweetsObject = $this->auth->get('statuses/user_timeline', [
            'screen_name' => 'HninouJulou',
            'exclude_replies' => true,
            'include_rts' => false,
            'count' => 50,
        ]);

        return $tweetsObject;
    }

    public function getTweets() {
        $tweets = [];
        foreach ($this->response as $_tweet => $value) {

            array_push($tweets, $this->response[$_tweet]->text);
        
        }
        return $tweets;
    }
}

$twitter = new Twitter();