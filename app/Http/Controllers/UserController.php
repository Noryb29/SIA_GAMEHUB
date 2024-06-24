<?php

namespace App\Http\Controllers; // Define the namespace for this controller

use App\Models\Users; // Import the Users model
use Illuminate\Http\Response; // Import the Response class from Illuminate\Http namespace
use App\Traits\ApiResponser; // Import the ApiResponser trait
use Illuminate\Http\Request; // Import the Request class from Illuminate\Http namespace
use DB; // Import the DB facade

class UserController extends Controller // Define the UserController class extending Controller
{
    use ApiResponser; // Use the ApiResponser trait in this class
    
    private $request; // Declare a private property to hold the Request instance

    public function __construct(Request $request) // Constructor method to initialize the controller
    {
        $this->request = $request; // Assign the injected Request instance to the property
    }

    public function getUsers() // Method to get all users
    {
        $users = Users::all(); // Retrieve all users from the database
        return response()->json($users, 200); // Return a JSON response with the users and status code 200
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function index() // Method to get all users using the success response trait
    {
        $users = Users::all(); // Retrieve all users from the database
        return $this->successResponse($users); // Return a successful JSON response with the users
    }

    public function add(Request $request) // Method to add a new user
    {
        $rules = [ // Define validation rules
            'username' => 'required|max:20', // Username is required and must be at most 20 characters
            'password' => 'required|max:20', // Password is required and must be at most 20 characters
            'user_email' => 'required|max:20', // User email is required and must be at most 20 characters
        ];

        $this->validate($request, $rules); // Validate the request against the rules
        $user = Users::create($request->all()); // Create a new user with the request data
        return $this->successResponse($user, Response::HTTP_CREATED); // Return a successful JSON response with the created user and status code 201
    }

    /**
     * Obtains and shows one user
     * @return Illuminate\Http\Response
     */
    public function show($id) // Method to get a user by ID
    {
        $user = Users::findOrFail($id); // Find the user by ID or fail
        return $this->successResponse($user); // Return a successful JSON response with the user
    }

    /**
     * Update an existing user
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id) // Method to update a user by ID
    {
        $rules = [ // Define validation rules
            'username' => 'max:20', // Username must be at most 20 characters
            'password' => 'max:20', // Password must be at most 20 characters
            'user_email' => 'required|max:20', // User email is required and must be at most 20 characters
        ];

        $this->validate($request, $rules); // Validate the request against the rules
        $user = Users::findOrFail($id); // Find the user by ID or fail

        $user->fill($request->all()); // Fill the user model with the request data
        // if no changes happen
        if ($user->isClean()) { // Check if the user model has no changes
            return $this->errorResponse('Update Error! Please change at least one value, Try Again.', Response::HTTP_UNPROCESSABLE_ENTITY); // Return an error response if no changes
        }
        $user->save(); // Save the updated user model
        return $this->successResponse($user); // Return a successful JSON response with the updated user
    }

    /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    public function delete($id) // Method to delete a user by ID
    {
        $user = Users::findOrFail($id); // Find the user by ID or fail
        $user->delete(); // Delete the user model
        return $this->successResponse($user); // Return a successful JSON response with the deleted user

    }

    // Utility functions for response handling
    protected function successResponse($data, $status = 200) // Method to return a successful JSON response
    {
        return response()->json($data, $status); // Return a JSON response with the provided data and status code
    }

    protected function errorResponse($message, $status) // Method to return an error JSON response
    {
        return response()->json(['Error!' => $message], $status); // Return a JSON response with the error message and status code
    }
}