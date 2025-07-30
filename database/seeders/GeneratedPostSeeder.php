<?php

namespace Database\Seeders;

use App\Models\GeneratedPost;
use Illuminate\Database\Seeder;

class GeneratedPostSeeder extends Seeder
{
    public function run(): void
    {
        GeneratedPost::factory(15)->create();
    }
}
