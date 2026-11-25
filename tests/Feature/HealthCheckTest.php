<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    /**
     * Test system health JSON endpoint (Fitur 2).
     */
    public function test_system_health_endpoint_returns_ok_json(): void
    {
        $response = $this->get('/health');

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'OK',
            'author' => 'ELIA KHOLIFATUS SAADAH',
        ]);
        $response->assertJsonStructure([
            'status',
            'timestamp',
            'app_name',
            'environment',
            'author',
            'php_version',
            'laravel_version',
            'checks' => ['database', 'cache', 'app_key'],
        ]);
    }
}
