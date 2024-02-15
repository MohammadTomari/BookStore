<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(TagSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);
    }
}
