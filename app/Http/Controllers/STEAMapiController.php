<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\STEAMapi;

class STEAMapiController extends Controller
{
    use ApiResponser;

    public $STEAMapi;

    public function __construct(STEAMapi $STEAMapi)
    {
        $this->STEAMapi = $STEAMapi;
    }

    public function getAppDetailsbyID(Request $request, $id) // GET APP DETAILS BY ID
    {
        return $this->successResponse($this->STEAMapi->getAppDetails($id));
    }

    public function searchByTitle($title) // SEARCH GAME/SOFTWARE/ANYTHING BY TITLE
    {
        return $this->successResponse($this->STEAMapi->searchByTitle($title));
    }

    public function searchReviews($id) // SEARCH GAME/SOFTWARE/ANYTHING BY TITLE
    {
        return $this->successResponse($this->STEAMapi->appReviews($id));
    }
}