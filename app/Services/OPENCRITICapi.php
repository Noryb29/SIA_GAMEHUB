<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use GuzzleHttp\Client;

class OPENCRITICapi{

    use ConsumesExternalService;

    public $baseUri;
    public $host;
    public $apiKey;
    public $limit = 30;

    public function __construct() // CONFIGURING CURRENT ROUTES FOR API
    {
        $this->baseUri = 'https://opencritic-api.p.rapidapi.com/';
        $this->host = 'opencritic-api.p.rapidapi.com';
        $this->apiKey = 'cb053b04aamsh93d44b1d47b70fdp10a2fcjsn14bb2debd7b2';
    }
    public function gameSearch($id){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"game/search?criteria={$id}",[],$headers);
    }

    public function authorSearch($author){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"author/search?criteria={$author}",[],$headers);
    }
    public function gameHallofFameYear($year){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"game/hall-of-fame/{$year}",[],$headers);
    }

    public function popularGames(){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"game/popular",[],$headers);
    }

    public function generalSearch($value){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"meta/search?criteria={$value}",[],$headers);
    }
    public function gameReviews($id){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"reviews/game/{$id}?skip=1&sort=newest",[],$headers);
    }
}