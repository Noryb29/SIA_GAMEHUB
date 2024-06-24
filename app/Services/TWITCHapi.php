<?php

namespace App\Services;

use App\Traits\ConsumesExternalService; // Import the ConsumesExternalService trait

class TWITCHapi {

    use ConsumesExternalService; // Use the ConsumesExternalService trait

    public $baseUri; // Base URI for the Twitch API
    public $host; // Hostname for the Twitch API
    public $apiKey; // API key for authentication

    public function __construct() // Constructor to initialize API settings
    {
        $this->baseUri = 'https://twitch-api8.p.rapidapi.com/'; // Base URI of the Twitch API
        $this->host = 'twitch-api8.p.rapidapi.com'; // Hostname of the Twitch API
        $this->apiKey = 'cb053b04aamsh93d44b1d47b70fdp10a2fcjsn14bb2debd7b2'; // RapidAPI key for authentication
    }

    // Method to get information about a Twitch streamer's panels
    public function getStreamerInfo($channel)
    {
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET', "get_channel_panels?channel=$channel", [], $headers);
    }

    // Method to get videos from a Twitch channel
    public function getChannelVideos($channel)
    {
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET', "get_channel_videos?channel=$channel", [], $headers);
    }
}
