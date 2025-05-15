<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name'=>'Tom Clancy',
            'photo'=>'tom_clancy.jpg',
            'bio'=>'Penulis spesialis novel aksi militer dan politik seperti "The Hunt for Red October", dikenal karena riset mendalamnya.',
        ]);

        Author::create([
            'name' => 'Robert Ludlum',
            'photo' => 'robert_ludlum.jpg',
            'bio' => 'Pengarang seri "Jason Bourne", novel-novelnya menggabungkan aksi spionase dan ketegangan.',
        ]);

        Author::create([
            'name' => 'Robert Ludlum',
            'photo' => 'robert_ludlum.jpg',
            'bio' => 'Pengarang seri "Jason Bourne", novel-novelnya menggabungkan aksi spionase dan ketegangan.',
        ]);

        Author::create([
            'name' => 'J.K. Rowling',
            'photo' => 'jk_rowling.jpg',
            'bio' => 'Penulis seri "Harry Potter" yang menggambarkan dunia sihir dan petualangan.',
        ]);

        Author::create([
            'name' => 'J.R.R. Tolkien',
            'photo' => 'jrr_tolkien.jpg',
            'bio' => 'Penulis karya epik "The Lord of the Rings" dan "The Hobbit", tokoh penting dalam genre fantasi.',
        ]);
    }
}
