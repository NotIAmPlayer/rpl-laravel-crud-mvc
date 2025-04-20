<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => 'john.doe',
        ]);
        User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'password' => 'jane.doe',
        ]);

        Task::factory()->create([
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'deadline' => now()->addDays(7),
            'status' => 'completed',
        ]);

        Task::factory()->create([
            'title' => 'Task 2',
            'description' => 'Description for Task 2',
            'deadline' => now()->addDays(14),
            'status' => 'progress',
        ]);

        Task::factory()->create([
            'title' => 'Task 2',
            'description' => 'Description for Task 2',
            'deadline' => now()->addDays(21),
            'status' => 'pending',
        ]);
    }
}
