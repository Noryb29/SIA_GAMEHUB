<?php

namespace App\Exceptions; // Define the namespace for this file

use App\Traits\ApiResponser; // Imports the ApiResponser trait
use Illuminate\Http\Request; // Imports the Request class from Illuminate\Http namespace
use Illuminate\Http\Response; // Imports the Response class from Illuminate\Http namespace
use Illuminate\Auth\AuthenticationException; // Imports the AuthenticationException class

use Illuminate\Auth\Access\AuthorizationException; // Imports the AuthorizationException class
use Illuminate\Database\Eloquent\ModelNotFoundException; // Imports the ModelNotFoundException class
use Illuminate\Validation\ValidationException; // Imports the ValidationException class
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler; // Imports the ExceptionHandler class and alias it as ExceptionHandler
use Symfony\Component\HttpKernel\Exception\HttpException; // Imports the HttpException class
use Throwable; // Imports the Throwable interface

class Handler extends ExceptionHandler // Define the Handler class extending ExceptionHandler
{
    /// Start
    use ApiResponser; // Use the ApiResponser trait in this class
    /// End
     
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [ // Define the types of exceptions that should not be reported
        AuthorizationException::class, // Do not report AuthorizationException
        HttpException::class, // Do not report HttpException
        ModelNotFoundException::class, // Do not report ModelNotFoundException
        ValidationException::class, // Do not report ValidationException
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception) // Method to report or log exceptions
    {
        parent::report($exception); // Call the parent class's report method
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception) // Method to render an exception into an HTTP response
    {
         // http not found    
         if ($exception instanceof HttpException) { // Check if the exception is an instance of HttpException
            $code = $exception->getStatusCode(); // Get the HTTP status code from the exception
            $message = Response::$statusTexts[$code]; // Get the corresponding status text
            return $this->errorResponse($message, $code); // Return a JSON response with the status text and code
        }
        
         // instance not found
         if ($exception instanceof ModelNotFoundException) { // Check if the exception is an instance of ModelNotFoundException
            $model = strtolower(class_basename($exception->getModel())); // Get the model name in lowercase
            return $this->errorResponse("Does not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND); // Return a JSON response indicating the model instance was not found
        }

        // validation exception
        if ($exception instanceof ValidationException) { // Check if the exception is an instance of ValidationException
            $errors = $exception->validator->errors()->getMessages(); // Get the validation errors
            return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY); // Return a JSON response with the validation errors and status code 422
        }

        // access to forbidden 
        if ($exception instanceof AuthorizationException) { // Check if the exception is an instance of AuthorizationException
            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN); // Return a JSON response with the exception message and status code 403
        }

        // unauthorized access
        if ($exception instanceof AuthenticationException) { // Check if the exception is an instance of AuthenticationException
            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED); // Return a JSON response with the exception message and status code 401
        }

        // if your are running in development environment 
        if (env('APP_DEBUG', false)) { // Check if the application is in debug mode
            return parent::render($request, $exception); // If in debug mode, use the parent class's render method
        }

         return $this->errorResponse('Unexpected error. Try later', Response::HTTP_INTERNAL_SERVER_ERROR); // Return a JSON response with a generic error message and status code 500
    }
}
