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
        Book::create([
            'name' => "Where\'s Bing A lift-the-flap book",
            'isbn' => '9780008497804',
            'price' => '45.0',
            'quantity' => '9',
            'image_path' => 'images/Where\'s Bing A lift-the-flap book.jpg'
        ]);
        Book::create([
            'name' => 'Spot Can Count',
            'isbn' => '9780241517505',
            'price' => '44.0',
            'quantity' => '4',
            'image_path' => 'images/Spot Can Count.jpg'
        ]);
        Book::create([
            'name' => 'Hilda and the White Woff (Netflix Tie In)',
            'isbn' => '9781838740290',
            'price' => '40.9',
            'quantity' => '12',
            'image_path' => 'images/Hilda and the White Woff (Netflix Tie In).jpg'
        ]);
        Book::create([
            'name' => 'Hilda and the Time Worm (Netflix Tie In)',
            'isbn' => '9781912497102',
            'price' => '40.0',
            'quantity' => '22',
            'image_path' => 'images/Hilda and the Time Worm (Netflix Tie In).jpg'
        ]);
        Book::create([
            'name' => 'Hilda and the Ghost Ship (Netflix Tie In)',
            'isbn' => '9781838740283',
            'price' => '40.0',
            'quantity' => '8',
            'image_path' => 'images/Hilda and the Ghost Ship (Netflix Tie In).jpg'
        ]);
        Book::create([
            'name' => "Geronimo Stilton #4: The Graphic Novel The Last Ride at Luna Park",
            'isbn' => "9781338729399",
            'price' => '34.32',
            'quantity' => '10',
            'image_path' => 'images/Geronimo Stilton 4 The Graphic Novel The Last Ride at Luna Park.jpg'
        ]);
        Book::create([
            'name' => 'Why We Need Water (Waffles + Mochi)',
            'isbn' => '9780593484364',
            'price' => '28.5',
            'quantity' => '3',
            'image_path' => 'images/Why We Need Water (Waffles Mochi).jpg'
        ]);
    }
}
