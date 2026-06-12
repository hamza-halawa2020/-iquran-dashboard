<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class HoneypotMiddleware
{
    // Fields that should always be empty — bots usually fill them all
    protected array $honeypotFields = ['website', 'url', 'homepage', 'company_url'];

    public function handle(Request $request, Closure $next): Response
    {
        foreach ($this->honeypotFields as $field) {
            if ($request->filled($field)) {
                Log::warning('honeypot.triggered', [
                    'ip' => $request->ip(),
                    'field' => $field,
                    'url' => $request->fullUrl(),
                ]);

                // Return a fake 200 so the bot thinks it succeeded
                return response()->json(['message' => 'Submission received.'], 200);
            }
        }

        return $next($request);
    }
}
