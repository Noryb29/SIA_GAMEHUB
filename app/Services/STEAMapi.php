<?php

namespace App\Services; // Define the namespace for the service

use App\Traits\ConsumesExternalService; // Import the ConsumesExternalService trait for API consumption
use GuzzleHttp\Client; // Import GuzzleHttp\Client for making HTTP requests

class STEAMapi {

    use ConsumesExternalService; // Use the ConsumesExternalService trait for API consumption

    public $baseUri; // Base URI for the Steam API
    public $host; // Hostname for the Steam API
    public $apiKey; // API key for authentication
    public $limit = 30; // Default limit for results (not used in current methods)

    public function __construct() // Constructor to initialize API settings
    {
        $this->baseUri = 'https://steam2.p.rapidapi.com/'; // Base URI of the Steam API
        $this->host = 'steam2.p.rapidapi.com'; // Hostname of the Steam API
        $this->apiKey = 'cb053b04aamsh93d44b1d47b70fdp10a2fcjsn14bb2debd7b2'; // RapidAPI key for authentication
    }

    // Method to get application details by ID
    public function getAppDetails($id)
    {
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET', "appDetail/$id", [], $headers);
    }

    // Method to search for applications by title
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

    // Method to get reviews for an application by ID
    public function appReviews($id, $limit = 30)
    {
        $client = new Client();
        $response = $client->request('GET', $this->baseUri . "appReviews/{$id}/limit/{$limit}/*", [
            'headers' => [
                'x-rapidapi-host' => $this->host,
                'x-rapidapi-key' => $this->apiKey,
            ],
        ]);

        return $response->getBody()->getContents();
    }
}
