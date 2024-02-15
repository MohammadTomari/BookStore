<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = array(
            array(
                'name' => 'Henriette Jacobs',
                'tag' => '4',
            ),
            array(
                'name' => 'Hergé',
                'tag' => '5',
            ),
            array(
                'name' => 'Stephen Hawking',
                'tag' => '1',
            ),
            array(
                'name' => 'Robert T. Kiyosaki',
                'tag' => '11',
            ),
        );

        foreach($authors as $author)
        {
            DB::table('authors')->insert([
                'name' => $author['name'],
                'tag' => $author['tag'],
            ]);
        }
    }
}
