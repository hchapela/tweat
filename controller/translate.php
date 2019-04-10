<?php

class Translate {

    // Translate
    public function translateText($_text, $_format) {
        // Define options
        $_text = mb_convert_encoding($_text, "UTF-8");
        $_model = $_format;
        $_options = array(
            "text" => $_text,
            "model_id" => $_model
        );
        $_options = json_encode($_options);
        $_headers = array();
        $_headers[] = 'Content-Type: application/json';
        $_query = '/v3/translate?version=2018-05-01';
        $response = $this->getCurl($_options, $_query, $_headers);
        $response = $response->translations[0]->translation;
        return $response;
    }

    // Identify Language of text
    public function identifyLanguage($_text) {
        $_text = mb_convert_encoding($_text, "UTF-8");
        $_options = (string) $_text;
        $_headers = array();
        $_headers[] = 'Content-Type: text/plain';
        $_query = '/v3/identify?version=2018-05-01';
        $response = $this->getCurl($_options, $_query, $_headers);
        $response = $response->languages[0]->language;
        return $response;
    }

    public function aff($_text) {
        echo '<pre>';
        print_r($_text);
        echo '</pre>';
    }

    public function getCurl($_options, $_query, $_headers) {
        $config = parse_ini_file('../config/config.ini');
        $apiKey = $config['tr_key'];
        $baseUrl = 'https://gateway-lon.watsonplatform.net/language-translator/api';
        $requestUrl = $baseUrl . $_query;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $_options);
        curl_setopt($ch, CURLOPT_USERPWD, 'apikey' . ':' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $_headers);
        $result = curl_exec($ch);
        $result = json_decode($result);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }
}