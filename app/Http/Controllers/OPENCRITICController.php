<?php

namespace App\Http\Controllers; // Define the namespace for this controller

use Illuminate\Http\Response; // Import the Response class from Illuminate\Http namespace
use App\Traits\ApiResponser; // Import the ApiResponser trait
use Illuminate\Http\Request; // Import the Request class from Illuminate\Http namespace
use App\Services\OPENCRITICapi; // Import the OPENCRITICapi service
use DB; // Import the DB facade

class OPENCRITICController extends Controller // Define the OPENCRITICController class extending Controller
{
    use ApiResponser; // Use the ApiResponser trait in this class

    public $OPENCRITICapi; // Declare a public property to hold the OPENCRITICapi service instance
    
    public function __construct(OPENCRITICapi $OPENCRITICapi) // Constructor method to initialize the controller
    {
        $this->OPENCRITICapi = $OPENCRITICapi; // Assign the injected OPENCRITICapi service instance to the property
    }

    public function gameSearch($id) // Method to get game details by ID
    {
        return $this->successResponse($this->OPENCRITICapi->gameSearch($id)); // Call the gameSearch method on the OPENCRITICapi service and return a successful JSON response
    }

    public function gameHallofFameYear($year) // Method to get Hall of Fame games for a specific year
    {
        return $this->successResponse($this->OPENCRITICapi->gameHallofFameYear($year)); // Call the gameHallofFameYear method on the OPENCRITICapi service and return a successful JSON response
    }

    public function popularGames() // Method to get popular games
    {
        return $this->successResponse($this->OPENCRITICapi->popularGames()); // Call the popularGames method on the OPENCRITICapi service and return a successful JSON response
    }

    public function findAuthor($author) // Method to find an author by name
    {
        return $this->successResponse($this->OPENCRITICapi->authorSearch($author)); // Call the authorSearch method on the OPENCRITICapi service and return a successful JSON response
    }

    public function generalSearch($value) // Method to perform a general search
    {
        return $this->successResponse($this->OPENCRITICapi->generalSearch($value)); // Call the generalSearch method on the OPENCRITICapi service and return a successful JSON response
    }

    public function gameReviews($id) // Method to get reviews for a specific game by ID
    {
        return $this->successResponse($this->OPENCRITICapi->gameReviews($id)); // Call the gameReviews method on the OPENCRITICapi service and return a successful JSON response
    }
}