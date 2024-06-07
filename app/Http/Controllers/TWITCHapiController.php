<?php

    namespace App\Http\Controllers;

    //use App\Models\User;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;
    use Illuminate\Http\Request;
    use DB;
    use App\Services\TWITCHapi;
    
class TWITCHapiController extends Controller
{
    use ApiResponser;

    public $TWITCHapi;
    
    public function __construct(TWITCHapi $TWITCHapi)
    {
        $this->TWITCHapi = $TWITCHapi;
    }

    // public function index()
    // {
    //     return $this->successResponse($this->TWITCHapi->obtainUsers2()); 
    // }

    public function getStreamerInfo($channel) // SEARCH GAME/SOFTWARE/ANYTHING BY TITLE
    {
        return $this->successResponse($this->TWITCHapi->getStreamerInfo($channel));
    }
    public function getChannelVideos($channel) // SEARCH GAME/SOFTWARE/ANYTHING BY TITLE
    {
        return $this->successResponse($this->TWITCHapi->getChannelVideos($channel));
    }


 
}
