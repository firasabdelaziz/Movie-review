<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Perform actions before the request is handled by subsequent middleware or the controller's action.

        // Execute the next middleware in the pipeline or the controller's action.
        // The response returned by the subsequent middleware or action will be captured in the $response variable.
        $response = $next($request);

        // Add CORS headers to the response to allow cross-origin requests.

        // Set the 'Access-Control-Allow-Origin' header to '*'.
        // This allows any domain to access the resources on the server.
        $response->header('Access-Control-Allow-Origin', '*');

        // Set the 'Access-Control-Allow-Methods' header to allow specific HTTP methods.
        // In this case, the server allows 'GET', 'POST', 'PUT', 'DELETE', and 'OPTIONS' methods.
        $response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

        // Set the 'Access-Control-Allow-Headers' header to allow specific request headers.
        // The 'Content-Type' header and 'Authorization' header are allowed in this case.
        $response->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');

        // Return the modified response with CORS headers to the client.
        return $response;
    }
}
