<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(4)->create();
         \App\Models\Category::factory(10)->create();
         \App\Models\Post::factory(20)->create();
        \App\Models\About::factory(1)->create();
        \App\Models\Like::factory(5)->create();
        \App\Models\Setting::factory(1)->create();
    }
}
