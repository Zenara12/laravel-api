<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        // Check if users exist before seeding tasks
        if ($users->isEmpty()) {
            $this->command->info('No users found. Please seed the users table first.');
            return;
        }

        // Create tasks for each user
        $users->each(function ($user) {
            Task::factory()->count(5)->create([
                'user_id' => $user->id, // Assign each task to a user
            ]);
        });
    }
}
