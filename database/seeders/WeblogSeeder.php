<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Weblog;
use App\Models\Category;

class WeblogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $weblogs = Weblog::factory()->count(50)->create();

        // loopje over weblogs om categorieën te syncen 

        foreach ($weblogs as $weblog) {
            $weblog->categories()->sync(Category::inRandomOrder()->first()->id);
        }
    }
}
