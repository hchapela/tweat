<?php

require "../vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

class Twitter {
    private $account;
    public function __construct($account) {
        $this->account = $account;
        $this->auth= $this->twitterOAuthentification();
        $this->response = $this->twitterRequest();
        $this->tweets = $this->getTweets();
    }

    // Handle Oauth2 
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
    
    // Get a list of tweets
    public function twitterRequest() {
        $tweetsObject = $this->auth->get('statuses/user_timeline', [
            'screen_name' => $this->account,
            'exclude_replies' => true,
            'include_rts' => false,
            'count' => 20,
        ]);

        // Handle errors
        if (isset($tweetsObject->errors) || empty($tweetsObject)) {
            header("Refresh:0; url=./");
            exit;
        }
        return $tweetsObject;
    }

    // Filter the content of the tweets wuthout date, likes etc.
    public function getTweets() {
        $tweets = [];
        if(isset($this->response->errors)) {
            return $tweets;
        }
        foreach ($this->response as $_tweet => $value) {
            array_push($tweets, $this->response[$_tweet]->text);
        }
        return $tweets;
    }
}
