<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Critic;
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
        $this->call([
            RoleSeeder::class,
            LanguageSeeder::class,
            ActorSeeder::class,
            FilmSeeder::class,
            ActorFilmSeeder::class,
        ]);

        User::factory(8)
            ->has(Critic::factory(30))
            ->create();

        User::factory()
            ->has(Critic::factory(30))
            ->create([
                'login' => 'user',
                'password' => 'password123',
                'email' => 'user@example.com',
                'last_name' => 'User',
                'first_name' => 'Standard',
                'role_id' => 1,
            ]);

        User::factory()
            ->has(Critic::factory(30))
            ->create([
                'login' => 'admin',
                'password' => 'password123',
                'email' => 'admin@example.com',
                'last_name' => 'Admin',
                'first_name' => 'Principal',
                'role_id' => 2,
            ]);
    }
}