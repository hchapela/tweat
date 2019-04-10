<?php

class Meal {
    public function __construct() {
        $this->ingredient = "chicken";
        $this->menuList = $this->getMenuList($this->ingredient);
    }

    // Get a list of menus with an ingredient
    public function getMenuList($_ingredient = "tomato") {
        $url = "https://www.themealdb.com/api/json/v1/1/filter.php?";
        $url .= http_build_query([
            'i' => $_ingredient
        ]);

        $this->mealList = $this->requestUrl($url)->meals;
        $tabLength = count($this->mealList);
        $index = rand(0, $tabLength);
        // Issue with index too high
        $index += ($index != 0 ? -1 : 0);

        $this->getMeal($this->mealList[$index]);
    }

    // Get a meal within the list of menus
    public function getMeal($meal) {
        $url = "https://www.themealdb.com/api/json/v1/1/lookup.php?";
        $url .= http_build_query([
            'i' => $meal->idMeal
        ]);
        $this->menu = $this->requestUrl($url);
    }

    // Request to ThemealAPI
    public function requestUrl($_url) {
        $curl = curl_init($_url);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        $result = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($result);

        return $result;
    }
}
