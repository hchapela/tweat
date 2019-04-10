<?php

class NaturalLanguageUnderstanding {

    public function __construct() {
        $this->text = "Just felt in love with that drumkit, Great performance @foals";
        $this->auth = $this->NLUAuth();
        $this->res = $this->getCurl();
    }

    public function NLUAuth() {
        header('Content-type: application/json; charset=utf-8');
        $auth = parse_ini_file('../config/config.ini');
        return $auth;
    }

    public function getCurl() {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, 'https://gateway-lon.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2018-03-19');
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        // Put user message & keywords (as a feature to analyze by Watson)
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, '{
            "text":"'.$this->text.'",
            "features":
            {
                "emotion": {}
            }
        }');
        // Put the API Key from config.ini file
        curl_setopt($this->curl, CURLOPT_USERPWD, 'apikey:'.$this->auth['nlu_key']);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
    
        $headers = array(
            'Content-Type: application/json',
        );
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
    
        // Decode the curl response
        $result = json_decode(curl_exec($this->curl));
    
        curl_close($this->curl);
        return $result;
    }
}
