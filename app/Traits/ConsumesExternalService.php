<?php

namespace App\Traits;

use GuzzleHttp\Client; // Import GuzzleHttp\Client for making HTTP requests

trait ConsumesExternalService
{
    // Method to perform an HTTP request to an external service
    public function performRequest($method, $requestUrl, $form_params = [], $headers = [])
    {
        // Create a new Guzzle HTTP client instance with base URI
        $client = new Client(['base_uri' => $this->baseUri]);
        
        // Perform the HTTP request using Guzzle client (method, URL, form parameters, headers)
        $response = $client->request($method, $requestUrl, [
            'form_params' => $form_params,
            'headers' => $headers,
        ]);

        // Return the response body contents
        return $response->getBody()->getContents();
    }
}
