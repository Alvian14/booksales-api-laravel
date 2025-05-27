<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\ReturnTypePass;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'order_number', 'customer_id', 'book_id', 'total_amount'
    ];

    // kode untuk langsung menampilkan data relasi
    public function user() {
        return $this->belongsTo(User::class, 'customer_id'); //kalau penamaan nya beda menambahkan seperti ini
    }

    public function book() {
        return $this->belongsTo(Book::class);
    }
}
