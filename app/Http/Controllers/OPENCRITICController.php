<?php

    namespace App\Http\Controllers;

    //use App\Models\User;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;
    use Illuminate\Http\Request;
    use DB;
    use App\Services\OPENCRITICapi;
    
class OPENCRITICController extends Controller
{
    use ApiResponser;

    public $OPENCRITICapi;
    
    public function __construct(OPENCRITICapi $OPENCRITICapi)
    {
        $this->OPENCRITICapi = $OPENCRITICapi;
    }

    // public function index()
    // {
    //     return $this->successResponse($this->OPENCRITICapi->obtainUsers2()); 
    // }

    public function gameSearch($id) // GET GAME DETAILS
    {
        return $this->successResponse($this->OPENCRITICapi->gameSearch($id));
    }
    public function gameHallofFameYear($year) // GET AUTHOR DETAILS
    {
        return $this->successResponse($this->OPENCRITICapi->gameHallofFameYear($year));
    }

    public function popularGames() // GET AUTHOR DETAILS
    {
        return $this->successResponse($this->OPENCRITICapi->popularGames());
    }


 
}
