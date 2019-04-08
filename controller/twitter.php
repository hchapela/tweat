<?php

require "../vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;


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

    $tweetsObject = $twitter->get('statuses/user_timeline', [
        'screen_name' => 'HninouJulou',
        'exclude_replies' => true,
        'include_rts' => false,
        'count' => 50,
    ]);

    $tweets = [];

    foreach ($tweetsObject as $_tweet => $value) {

        array_push($tweets, $tweetsObject[$_tweet]->text);
        
    }

    echo '<pre>';
    print_r($tweets);
    echo '</pre>';