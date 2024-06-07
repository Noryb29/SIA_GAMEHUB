<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class TWITCHapi{

    use ConsumesExternalService;

    public $baseUri;
    public $host;
    public $apiKey;

    public function __construct() // CONFIGURING CURRENT ROUTES FOR API
    {
        $this->baseUri = 'https://twitch-api8.p.rapidapi.com/';
        $this->host = 'twitch-api8.p.rapidapi.com';
        $this->apiKey = 'cb053b04aamsh93d44b1d47b70fdp10a2fcjsn14bb2debd7b2';
    }
    public function getStreamerInfo($channel){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"get_channel_panels?channel=$channel",[],$headers);
    }
    public function getChannelVideos($channel){
        $headers = [
            'x-rapidapi-host' => $this->host,
            'x-rapidapi-key' => $this->apiKey,
        ];

        return $this->performRequest('GET',"get_channel_videos?channel=$channel",[],$headers);
    }

    
    
 }
