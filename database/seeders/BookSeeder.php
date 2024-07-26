<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $books = [
            [
                'title' => 'apple keyboard',
                'description' => 'Kiersten White',
                'price' => 1314,
                'stock' => 13,
                'img' => 'https://bookcart.azurewebsites.net/Upload/6d91b7b0-b8d1-41ad-a0ef-65e2324fc1b3Slayer.jpg',
            ],
        ];

        foreach ($books as $key => $value) {
            Book::create($value);
        }
    }
}
