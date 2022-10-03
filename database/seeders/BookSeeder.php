<?php

namespace Database\Seeders;

use App\Models\Book;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $result = File::copyDirectory(__DIR__.'/book/images', storage_path('/app/public/images'));
        Log::info("book seeder image copy is: $result");
        Book::create([
            'name' => 'Curious George My First Kite',
            'isbn' => '9780358549352',
            'price' => '34.00',
            'quantity' => '2',
            'image_path' => 'images/Curious George My First Kite.jpg',
        ]);
        Book::create([
            'name' => 'Frog and Toad: Storybook Favorites',
            'isbn' => '9780062883124',
            'price' => '52.76',
            'quantity' => '4',
            'image_path' => 'images/Frog and Toad Storybook Favorites.jpg'
        ]);
        Book::create([
            'name' => 'Peppa Pig: Magical Creatures Tabbed Board Book',
            'isbn' => '9780241543368',
            'price' => '41.20',
            'quantity' => '12',
            'image_path' => 'images/Peppa Pig Magical Creatures Tabbed Board Book.jpg'
        ]);
        Book::create([
            'name' => 'Peppa Pig: Peppa at the Farm',
            'isbn' => '9780241543443',
            'price' => '36.00',
            'quantity' => '4',
            'image_path' => 'images/Peppa Pig Peppa at the Farm.jpg'
        ]);
        Book::create([
            'name' => 'Peter Rabbit: Peter\'s Picnic : A Pull-Tab and Play Book',
            'isbn' => '9780241529874',
            'price' => '47.20',
            'quantity' => '3',
            'image_path' => 'images\Peter Rabbit Peter\'s Picnic A Pull-Tab and Play Book.jpg'
        ]);
        Book::create([
            'name' => 'Geronimo Stilton #81: The Super Cup Face-Off',
            'isbn' => '9781338802269',
            'price' => '19.12',
            'quantity' => '22',
            'image_path' => 'images/Geronimo Stilton 81 The Super Cup Face-Off.jpg'
        ]);
        Book::create([
            'name' => 'The Adventures of Paddington: Hide-and-Seek',
            'isbn' => '9780008484378',
            'price' => '36.00',
            'quantity' => '8',
            'image_path' => 'images/The Adventures of Paddington Hide-and-Seek.jpg'
        ]);
    }
}
