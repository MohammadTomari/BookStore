<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = array(
            array(
                'title' => 'Lucky Luke',
                'author_id' => 1,
                'price' => 29.99,
                'year' => 2005,
                'tag_id' => 4,
            ),
            array(
                'title' => 'Les Aventures de Tintin - Tintin en Amérique',
                'author_id' => 2,
                'price' => 22,
                'year' => 1931,
                'tag_id' => 5,
            ),
            array(
                'title' => 'The Theory of Everything',
                'author_id' => 3,
                'price' => 22,
                'year' => 2010,
                'tag_id' => 7,
            ),
            array(
                'title' => 'A Brief History of Time',
                'author_id' => 3,
                'price' => 34.75,
                'year' => 1998,
                'tag_id' => 9,
            ),
            array(
                'title' => 'Rich Dad Poor Dad',
                'author_id' => 4,
                'price' => 10.99,
                'year' => 2022,
                'tag_id' => 11,
            ),
            array(
                'title' => 'Why the Rich Are Getting Richer',
                'author_id' => 4,
                'price' => 9.99,
                'year' => 2022,
                'tag_id' => 11,
            ),
        );

        foreach($books as $book)
        {
            DB::table('books')->insert([
                'title' => $book['title'],
                'author_id' => $book['author_id'],
                'price' => $book['price'],
                'year' => $book['year'],
                'tag_id' => $book['tag_id'],
            ]);
        }
    }
}
