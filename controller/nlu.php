<?php

class NaturalLanguageUnderstanding {

    public function nlu($_text) {
        $this->auth = $this->NLUAuth();
        $this->results = $this->getCurl($_text);
        // If can't translate tweet
        if(isset($this->results->error)) {
            return "not emotion";
        }
        // Return all emotions
        return $this->results;
    }

    public function getAverage($_results) {
        $_results = ($_results->emotion->document->emotion);
        $_results = (array) $_results;
        $maxValue = 0;
        $maxIndex = "";
        foreach ($_results as $key => $value) {
            if($value > $maxValue) {
                $maxValue = $value;
                $maxIndex = $key;
            }
        }
        return $maxIndex;
    }

    public function addNewEmotions($_arr, $_full) {
        $index = ['sadness', 'joy', 'fear', 'disgust', 'anger'];
        for ($i=0; $i < 5; $i++) { 
            $fullIndex = $index[$i];
            $_full[$i] = $_full[$i] + $_arr[$fullIndex];
        }
        return $_full;
    }

    public function calculateDatas($_arr, $_iterations) {
        for ($i=0; $i<5 ; $i++) { 
            $_arr[$i] = $_arr[$i] / $_iterations;
        }

        $newArr = array(
            'sadness' => $_arr[0],
            'joy' => $_arr[1],
            'fear' => $_arr[2],
            'disgust' => $_arr[3],
            'anger' => $_arr[4]
        );

        return $newArr;
    }

    public function NLUAuth() {
        $auth = parse_ini_file('../config/config.ini');
        return $auth;
    }

    public function getCurl($_text) {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, 'https://gateway-lon.watsonplatform.net/natural-language-understanding/api/v1/analyze?version=2018-03-19');
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
        // Put user message & keywords (as a feature to analyze by Watson)
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, '{
            "text":"'.$_text.'",
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
