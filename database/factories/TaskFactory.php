<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        $states = ['In curs', 'Finalizata', 'Anulata'];
        return [
            'nume' => $this->faker->sentence(3),
            'descriere' => $this->faker->paragraph(2),
            'stare' => $this->faker->randomElement($states),
        ];
    }
}
