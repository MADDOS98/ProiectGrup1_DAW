<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Task::create([
            'nume' => 'Creează design homepage',
            'descriere' => 'Realizează design-ul modern pentru pagina principală folosind Bootstrap și paleta de culori.',
            'stare' => 'In curs',
        ]);
        Task::create([
            'nume' => 'Implementare autentificare',
            'descriere' => 'Adaugă funcționalitate de login și logout pentru utilizatori.',
            'stare' => 'Finalizata',
        ]);
        Task::create([
            'nume' => 'Testare funcționalitate CRUD',
            'descriere' => 'Testează toate operațiile de creare, editare și ștergere task.',
            'stare' => 'Anulata',
        ]);
    }
}
