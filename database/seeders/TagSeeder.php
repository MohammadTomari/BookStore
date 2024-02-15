<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = array(
            'Science', 
            'Historical', 
            'Biographical',
            'Novels',
            'Comics',
            'Manga',
            'Physics',
            'Cosmology',
            'Astronomy',
            'Relativity Physics',
            'Personal Finance',
        );

        foreach ($tags as $tag)
        {
            DB::table('tags')->insert([
                'name' => $tag,
            ]); 
        }
    }
}
