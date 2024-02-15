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
                'author' => 1,
                'price' => 29.99,
                'year' => 2005,
                'tag' => 4,
            ),
            array(
                'title' => 'Les Aventures de Tintin - Tintin en Amérique',
                'author' => 2,
                'price' => 22,
                'year' => 1931,
                'tag' => 5,
            ),
            array(
                'title' => 'The Theory of Everything',
                'author' => 3,
                'price' => 22,
                'year' => 2010,
                'tag' => 7,
            ),
            array(
                'title' => 'A Brief History of Time',
                'author' => 3,
                'price' => 34.75,
                'year' => 1998,
                'tag' => 9,
            ),
            array(
                'title' => 'Rich Dad Poor Dad',
                'author' => 4,
                'price' => 10.99,
                'year' => 2022,
                'tag' => 11,
            ),
            array(
                'title' => 'Why the Rich Are Getting Richer',
                'author' => 4,
                'price' => 9.99,
                'year' => 2022,
                'tag' => 11,
            ),
        );

        foreach($books as $book)
        {
            DB::table('books')->insert([
                'title' => $book['title'],
                'author' => $book['author'],
                'price' => $book['price'],
                'year' => $book['year'],
                'tag' => $book['tag'],
            ]);
        }
    }
}
