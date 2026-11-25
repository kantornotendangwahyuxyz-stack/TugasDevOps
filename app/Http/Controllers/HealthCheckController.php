<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HealthCheckController extends Controller
{
    /**
     * Check system health and return JSON response.
     */
    public function check(): JsonResponse
    {
        $dbConnected = false;
        try {
            DB::connection()->getPdo();
            $dbConnected = true;
        } catch (\Exception $e) {
            $dbConnected = false;
        }

        $healthStatus = [
            'status' => 'OK',
            'timestamp' => now()->toIso8601String(),
            'app_name' => config('app.name'),
            'environment' => config('app.env'),
            'author' => 'ELIA KHOLIFATUS SAADAH',
            'php_version' => PHP_VERSION,
            'laravel_version' => app()->version(),
            'checks' => [
                'database' => $dbConnected ? 'CONNECTED' : 'DISCONNECTED',
                'cache' => Cache::has('health_test') ? 'OK' : 'OPERATIONAL',
                'app_key' => config('app.key') ? 'SET' : 'MISSING',
            ]
        ];

        return response()->json($healthStatus, 200);
    }
}
