<?php


class Analyzer {

    public $string;
    public $tw_consumer_key = "b6v2AIxyD35QKN2R3nb0TgDqu";
    public $tw_consumer_secret = "YKQw9RE9YnO6idOcafi3TXSMg3HPp7LHFph893pbvhgAhdxMCl";
    public $tw_bearer_token = "AAAAAAAAAAAAAAAAAAAAAAxT6wAAAAAAQUWLo9hoE%2BdVx51OJcBvnbBovE4%3DhJuOeLm3qhrkH2oGOO5Jbb5B66SX7zNv3qqLcLbeO055KNh5i5";

    public function __construct($string = "Hello World!") {
        $this->tw_key = $tw_consumer_key;
        $this->tw_secret = $tw_consumer_secret;
        $this->tw_token = $tw_bearer_token;

        $this->string = $string;

        $this->say();

    }

    public function say() {
        return $this->string;
    }

    public function analyze() {

    }
}



$analyzer = new Analyzer();