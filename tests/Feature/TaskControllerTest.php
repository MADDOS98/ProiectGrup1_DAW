<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_tasks()
    {
        $task = Task::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($task->nume);
    }

    public function test_create_page_loads()
    {
        $response = $this->get('/create');
        $response->assertStatus(200);
        $response->assertSee('Creare Task');
    }

    public function test_store_creates_task()
    {
        $data = [
            'nume' => 'Test Task',
            'descriere' => 'Descriere test',
            'stare' => 'In curs',
        ];
        $response = $this->post('/', $data);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('tasks', ['nume' => 'Test Task']);
    }

    public function test_edit_page_loads()
    {
        $task = Task::factory()->create();
        $response = $this->get('/' . $task->id);
        $response->assertStatus(200);
        $response->assertSee($task->nume);
    }

    public function test_update_modifies_task()
    {
        $task = Task::factory()->create();
        $data = [
            'nume' => 'Task Modificat',
            'descriere' => 'Descriere noua',
            'stare' => 'Finalizata',
        ];
        $response = $this->put('/' . $task->id, $data);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('tasks', ['nume' => 'Task Modificat', 'stare' => 'Finalizata']);
    }

    public function test_destroy_deletes_task()
    {
        $task = Task::factory()->create();
        $response = $this->delete('/' . $task->id . '/delete');
        $response->assertRedirect('/');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
