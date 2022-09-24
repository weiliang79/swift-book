<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'name' => 'Curious George My First Kite',
            'isbn' => '9780358549352',
            'price' => '34.00',
            'quantity' => '2',
            'image_path' => 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9780358549352_326x.jpg',
        ]);
        Book::create([
            'name' => 'Frog and Toad: Storybook Favorites',
            'isbn' => '9780062883124',
            'price' => '52.76',
            'quantity' => '4',
            'image_path' => 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/51UUzPGVmrL._SX468_BO1_204_203_200_400x.jpg',
        ]);
        Book::create([
            'name' => 'Peppa Pig: Magical Creatures Tabbed Board Book',
            'isbn' => '9780241543368',
            'price' => '41.20',
            'quantity' => '12',
            'image_path' => 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9780241543368_400x.jpg',
        ]);
        Book::create([
            'name' => 'Peppa Pig: Peppa at the Farm',
            'isbn' => '9780241543443',
            'price' => '36.00',
            'quantity' => '4',
            'image_path' => 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9780241543443_400x.jpg',
        ]);
        Book::create([
            'name' => 'Peter Rabbit: Peter\'s Picnic : A Pull-Tab and Play Book',
            'isbn' => '9780241529874',
            'price' => '47.20',
            'quantity' => '3',
            'image_path' => 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9780241529874_400x.jpg',
        ]);
        Book::create([
            'name' => 'Geronimo Stilton #81: The Super Cup Face-Off',
            'isbn' => '9781338802269',
            'price' => '19.12',
            'quantity' => '22',
            'image_path' => 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9781338802269_275x.jpg?v=1656491217',
        ]);
        Book::create([
            'name' => 'The Adventures of Paddington: Hide-and-Seek',
            'isbn' => '9780008484378',
            'price' => '36.00',
            'quantity' => '8',
            'image_path' => 'https://cdn.shopify.com/s/files/1/0511/7575/1837/products/9780008484378_400x.jpg?v=1650428784',
        ]);
    }
}
