<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_that_time_formatting_returns_valid_string(): void
    {
        $timeStr = date('H:i:s');
        $this->assertNotEmpty($timeStr);
        $this->assertIsString($timeStr);
    }
}
