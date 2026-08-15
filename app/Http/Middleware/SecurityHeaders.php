<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (method_exists($response, 'headers')) {
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
            $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline'; img-src 'self' data: https:; font-src 'self' data:; connect-src 'self';");
            $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
            
            // Apply HSTS in production
            if (app()->environment('production')) {
                $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
            }
        }

        return $response;
    }
}
