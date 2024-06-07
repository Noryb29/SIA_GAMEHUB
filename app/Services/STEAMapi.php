<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;
use GuzzleHttp\Client;

class STEAMapi{

    use ConsumesExternalService;

    public $baseUri;
    public $host;
    public $apiKey;
    public $limit = 30;

    public function __construct() // CONFIGURING CURRENT ROUTES FOR API
    {
        $this->baseUri = 'https://steam2.p.rapidapi.com/';
        $this->host = 'steam2.p.rapidapi.com';
        $this->apiKey = 'cb053b04aamsh93d44b1d47b70fdp10a2fcjsn14bb2debd7b2';
    }

    public function getAppDetails($id){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"appDetail/$id",[],$headers);
    }
    
    public function searchByTitle($title)
    {
        $client = new Client();
        $response = $client->request('GET', $this->baseUri . "search/{$title}/page/1", [
            'headers' => [
                'x-rapidapi-host' => $this->host,
                'x-rapidapi-key' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }

    public function appReviews($id,$limit=30)
    {
        $client = new Client();
        $response = $client->request('GET', $this->baseUri . "appReviews/{$id}/limit/30/*", [
            'headers' => [
                'x-rapidapi-host' => $this->host,
                'x-rapidapi-key' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}