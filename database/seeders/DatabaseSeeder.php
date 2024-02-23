<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\IdeaSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\StatusSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            StatusSeeder::class,
            IdeaSeeder::class,
            VoteSeeder::class,
        ]);
    }
}
