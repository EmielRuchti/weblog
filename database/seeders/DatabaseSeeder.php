<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Weblog;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        /**
        * User::factory()->create([
        *    'name' => 'Test User',
        *    'email' => 'test@example.com',
        * ]);
        */
        $this->call([
            CategorySeeder::class,
            WeblogSeeder::class,
            //CategoryWeblogSeeder::class,
        ]);
    }
}
