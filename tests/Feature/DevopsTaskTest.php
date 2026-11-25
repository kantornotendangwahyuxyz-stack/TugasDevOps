<?php

namespace Tests\Feature;

use App\Models\DevopsTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DevopsTaskTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Eloquent Task creation and index view.
     */
    public function test_can_create_and_display_devops_task(): void
    {
        $response = $this->post('/tasks', [
            'title' => 'Deploy Laravel Container to Staging',
            'description' => 'Docker Compose testing on port 8080',
            'assigned_to' => 'ELIA KHOLIFATUS SAADAH',
        ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('devops_tasks', [
            'title' => 'Deploy Laravel Container to Staging',
            'status' => 'pending',
            'assigned_to' => 'ELIA KHOLIFATUS SAADAH',
        ]);

        $indexResponse = $this->get('/tasks');
        $indexResponse->assertStatus(200);
        $indexResponse->assertSee('Deploy Laravel Container to Staging');
    }

    /**
     * Test updating task status via Eloquent.
     */
    public function test_can_update_task_status(): void
    {
        $task = DevopsTask::create([
            'title' => 'Unit Test Verification',
            'description' => 'Run php artisan test',
            'assigned_to' => 'ELIA KHOLIFATUS SAADAH',
            'status' => 'pending',
        ]);

        $response = $this->patch("/tasks/{$task->id}/status", [
            'status' => 'completed',
        ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseHas('devops_tasks', [
            'id' => $task->id,
            'status' => 'completed',
        ]);
    }
}
