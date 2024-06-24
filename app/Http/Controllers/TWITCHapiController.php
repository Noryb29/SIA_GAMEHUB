<?php

namespace App\Http\Controllers; // Define the namespace for this controller

use Illuminate\Http\Response; // Import the Response class from Illuminate\Http namespace
use App\Traits\ApiResponser; // Import the ApiResponser trait
use Illuminate\Http\Request; // Import the Request class from Illuminate\Http namespace
use App\Services\TWITCHapi; // Import the TWITCHapi service
use DB; // Import the DB facade

class TWITCHapiController extends Controller // Define the TWITCHapiController class extending Controller
{
    use ApiResponser; // Use the ApiResponser trait in this class

    public $TWITCHapi; // Declare a public property to hold the TWITCHapi service instance
    
    public function __construct(TWITCHapi $TWITCHapi) // Constructor method to initialize the controller
    {
        $this->TWITCHapi = $TWITCHapi; // Assign the injected TWITCHapi service instance to the property
    }

    public function getStreamerInfo($channel) // Method to get streamer info by channel name
    {
        return $this->successResponse($this->TWITCHapi->getStreamerInfo($channel)); // Call the getStreamerInfo method on the TWITCHapi service and return a successful JSON response
    }

    public function getChannelVideos($channel) // Method to get channel videos by channel name
    {
        return $this->successResponse($this->TWITCHapi->getChannelVideos($channel)); // Call the getChannelVideos method on the TWITCHapi service and return a successful JSON response
    } 
}