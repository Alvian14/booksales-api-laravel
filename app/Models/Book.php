<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    // private $books = [
    //     [
    //         'title' => 'Pulang',
    //         'description' => 'Petulangan Seorang pemuda yang kembali ke desa kelahirannya.',
    //         'price' => 40000,
    //         'stock' => 15,
    //         'cover_photo' => 'pulang.jpg',
    //         'genre_id' => 1,
    //         'author_id' => 1,
    //     ],
    //     [
    //         'title' => 'Sebuah Seni Untuk Bersikap Bodo Amat',
    //         'description' => 'Buku yang membahas tentang kehidupan dan filosofi hidup seseorang.',
    //         'price' => 25000,
    //         'stock' => 5,
    //         'cover_photo' => 'sebuah_seni.jpg',
    //         'genre_id' => 2,
    //         'author_id' => 2
    //     ],
    //     [
    //         'title' => 'Laskar Pelangi',
    //         'description' => 'Kisah perjuangan anak-anak dari Belitung untuk mendapatkan pendidikan yang layak.',
    //         'price' => 35000,
    //         'stock' => 20,
    //         'cover_photo' => 'laskar_pelangi.jpg',
    //         'genre_id' => 3,
    //         'author_id' => 3
    //     ],
    //     [
    //         'title' => 'Bumi Manusia',
    //         'description' => 'Novel sejarah yang menceritakan perjuangan Minke di masa kolonial Belanda.',
    //         'price' => 50000,
    //         'stock' => 10,
    //         'cover_photo' => 'bumi_manusia.jpg',
    //         'genre_id' => 1,
    //         'author_id' => 4
    //     ],
    //     [
    //         'title' => 'Filosofi Teras',
    //         'description' => 'Buku yang mengajarkan filosofi Stoisisme untuk mengatasi kecemasan dan depresi.',
    //         'price' => 45000,
    //         'stock' => 25,
    //         'cover_photo' => 'filosofi_teras.jpg',
    //         'genre_id' => 2,
    //         'author_id' => 5
    //     ]
    // ];

    // public function getBooks() {
    //     return $this->books;
    // }
}
