<?php

class NaturalLanguageUnderstanding {

    public function aff($_text) {
        echo '<pre>';
        print_r($_text);
        echo '</pre>';
    }

    public function nlu($_text) {
        $this->auth = $this->NLUAuth();
        $results = $this->getCurl($_text);
        $this->emotion = $this->getAverage($results);
        return $this->emotion;
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
