<?php

namespace App\Services; // Define the namespace for the service

use App\Traits\ConsumesExternalService; // Import the ConsumesExternalService trait for API consumption
use GuzzleHttp\Client; // Import GuzzleHttp\Client for making HTTP requests

class OPENCRITICapi {
    
    use ConsumesExternalService; // Use the ConsumesExternalService trait for API consumption

    public $baseUri; // Base URI for the OpenCritic API
    public $host; // Hostname for the OpenCritic API
    public $apiKey; // API key for authentication
    public $limit = 30; // Default limit for results (not used in current methods)

    public function __construct() // Constructor to initialize API settings
    {
        $this->baseUri = 'https://opencritic-api.p.rapidapi.com/'; // Base URI of the OpenCritic API
        $this->host = 'opencritic-api.p.rapidapi.com'; // Hostname of the OpenCritic API
        $this->apiKey = 'cb053b04aamsh93d44b1d47b70fdp10a2fcjsn14bb2debd7b2'; // RapidAPI key for authentication
    }

    // Method to search for a game by ID
    public function gameSearch($id)
    {
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET', "game/search?criteria={$id}", [], $headers);
    }

    // Method to perform a general search
    public function generalSearch($value)
    {
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET', "meta/search?criteria={$value}", [], $headers);
    }

    // Method to get reviews for a game by ID
    public function gameReviews($id)
    {
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET', "reviews/game/{$id}?skip=1&sort=newest", [], $headers);
    }
}
