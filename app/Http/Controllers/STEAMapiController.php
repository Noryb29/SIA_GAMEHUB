<?php

namespace App\Http\Controllers; // Define the namespace for this controller

use App\Traits\ApiResponser; // Import the ApiResponser trait
use Illuminate\Http\Request; // Import the Request class from Illuminate\Http namespace
use App\Services\STEAMapi; // Import the STEAMapi service

class STEAMapiController extends Controller // Define the STEAMapiController class extending Controller
{
    use ApiResponser; // Use the ApiResponser trait in this class

    public $STEAMapi; // Declare a public property to hold the STEAMapi service instance

    public function __construct(STEAMapi $STEAMapi) // Constructor method to initialize the controller
    {
        $this->STEAMapi = $STEAMapi; // Assign the injected STEAMapi service instance to the property
    }

    public function getAppDetailsbyID(Request $request, $id) // Method to get app details by ID
    {
        return $this->successResponse($this->STEAMapi->getAppDetails($id)); // Call the getAppDetails method on the STEAMapi service and return a successful JSON response
    }

    public function searchByTitle($title) // Method to search for an app by title
    {
        return $this->successResponse($this->STEAMapi->searchByTitle($title)); // Call the searchByTitle method on the STEAMapi service and return a successful JSON response
    }

    public function searchReviews($id) // Method to get reviews for an app by ID
    {
        return $this->successResponse($this->STEAMapi->appReviews($id)); // Call the appReviews method on the STEAMapi service and return a successful JSON response
    }
}