<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'The Hunt for Red October',
            'description' => 'Novel spionase militer tentang pembelotan kapten kapal selam Soviet.',
            'price' => 159000,
            'stock' => 10,
            'cover_photo' => 'red_october.jpg',
            'genre_id' => 1, 
            'author_id' => 1 
        ]);

        Book::create([
            'title' => 'The Bourne Identity',
            'description' => 'Seorang pria dengan amnesia mencoba menemukan identitasnya di tengah konspirasi mematikan.',
            'price' => 135000,
            'stock' => 8,
            'cover_photo' => 'bourne_identity.jpg',
            'genre_id' => 1, 
            'author_id' => 2  
        ]);

        Book::create([
            'title' => 'The Notebook',
            'description' => 'Kisah cinta yang mengharukan antara Noah dan Allie yang teruji oleh waktu.',
            'price' => 98000,
            'stock' => 12,
            'cover_photo' => 'the_notebook.jpg',
            'genre_id' => 2, 
            'author_id' => 3  
        ]);

        Book::create([
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'description' => 'Petualangan awal Harry Potter di Hogwarts School of Witchcraft and Wizardry.',
            'price' => 145000,
            'stock' => 15,
            'cover_photo' => 'hp_sorcerer_stone.jpg',
            'genre_id' => 3, 
            'author_id' => 4  
        ]);

        Book::create([
            'title' => 'The Fellowship of the Ring',
            'description' => 'Bagian pertama dari petualangan epik dalam "The Lord of the Rings".',
            'price' => 172000,
            'stock' => 7,
            'cover_photo' => 'fellowship_ring.jpg',
            'genre_id' => 3, 
            'author_id' => 5  
        ]);
    }
}
