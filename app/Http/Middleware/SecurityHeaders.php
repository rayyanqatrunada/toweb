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

        if (isset($response->headers)) {
            $response->headers->set('X-Content-Type-Options', 'nosniff');
            $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
            $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

            if (app()->environment('production')) {
                $response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' blob:; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' data: https://fonts.gstatic.com; img-src 'self' data: https: blob:; worker-src 'self' blob:; frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://www.google.com; connect-src 'self' https:;");
                $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
            } else {
                // In local/development, permit Vite dev server and HMR WebSockets
                $response->headers->set('Content-Security-Policy', "default-src 'self' http://localhost:* http://127.0.0.1:* http://[::1]:*; script-src 'self' 'unsafe-inline' 'unsafe-eval' blob: http://localhost:* http://127.0.0.1:* http://[::1]:*; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com http://localhost:* http://127.0.0.1:* http://[::1]:*; font-src 'self' data: https://fonts.gstatic.com http://localhost:* http://127.0.0.1:* http://[::1]:*; img-src 'self' data: https: blob: http://localhost:* http://127.0.0.1:* http://[::1]:*; worker-src 'self' blob:; frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://www.google.com; connect-src 'self' https: http://localhost:* http://127.0.0.1:* http://[::1]:* ws://localhost:* ws://127.0.0.1:* ws://[::1]:*;");
            }
        }

        return $response;
    }
}
