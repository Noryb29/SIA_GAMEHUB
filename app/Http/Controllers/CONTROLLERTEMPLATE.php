<?php

    namespace App\Http\Controllers;

    //use App\Models\User;
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser;
    use Illuminate\Http\Request;
    use DB;
    use App\Services\STEAMapi;
    
class STEAMapiController extends Controller
{
    use ApiResponser;

    public $STEAMapi;

    public function __construct(STEAMapi $STEAMapi)
    {
        $this->STEAMapi = $STEAMapi;
    }

    public function index()
    {
        return $this->successResponse($this->STEAMapi->obtainUsers1()); 
    }

    public function add(Request $request)
    {
        return $this->successResponse($this->STEAMapi->createUser1($request->all(), Response::HTTP_CREATED));
    }

    public function show($id)
    {
        return $this->successResponse($this->STEAMapi->obtainUser1($id));
    }

    public function update(Request $request, $id)
    {
        return $this->successResponse($this->STEAMapi->editUser1($request->all(), $id));
    }

    public function delete($id)
    {
        return $this->successResponse($this->STEAMapi->deleteUser1($id));
    }

    public function getAppDetailsbyID(Request $request,$id)
    {
        return $this->successResponse($this->STEAMapi->getAppDetails($id));
    }
    public function searchByTitle($title)
    {
        return $this->successResponse($this->STEAMapi->searchByTitle($title));
    }

 
}
