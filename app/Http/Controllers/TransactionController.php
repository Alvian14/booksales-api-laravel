<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() {
        $transaction = Transaction::with('user', 'book')->get();

        if ($transaction->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Resource data not found!",
                "data" => null
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get All Resource",
            "data" => $transaction
        ], 200);
    }

    
    public function store(Request $request) {

        $validator = Validator::make($request->all(),[
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validator erors',
                'data' => $validator->errors()
            ], 422);
        }

        //generate order number
        $uniqueCode = "ORD-" . strtoupper(uniqid());

        //ambil user yang sedang login & cek login
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized!'
            ], 401);
        }

        //mencari data buku dari request
        $book = Book::find($request->book_id);

        //cek stock buku
        if ($book->stock < $request->quantity) {
             return response()->json([
                'success' => false, 
                'message' => 'low stock of books'
             ], 400);
        }

        //hitung total harga
        $totalAmount = $book->price * $request->quantity;

        //kurangi stok (update)
        $book->stock -= $request->quantity;
        $book->save();

        //simpan data transaksi
        $transactions = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transactions
        ], 201);

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validator errors',
                'data' => $validator->errors()
            ], 422);
        }

        // Ambil user login
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        // Ambil transaksi berdasarkan ID
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        // Pastikan hanya pemilik yang bisa update transaksinya sendiri
        if ($transaction->customer_id != $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden - You are not allowed to update this transaction'
            ], 403);
        }

        // Ambil buku lama dan kembalikan stok-nya
        $oldBook = Book::find($transaction->book_id);
        $oldBook->stock += 1; // atau kembalikan jumlah lama kalau disimpan
        $oldBook->save();

        // Ambil buku baru
        $newBook = Book::find($request->book_id);

        // Cek stok buku baru
        if ($newBook->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Low stock of books'
            ], 400);
        }

        // Kurangi stok buku baru
        $newBook->stock -= $request->quantity;
        $newBook->save();

        // Update transaksi
        $transaction->book_id = $request->book_id;
        $transaction->total_amount = $newBook->price * $request->quantity;
        $transaction->save();

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully',
            'data' => $transaction
        ]);
    }

    public function destroy($id)
    {
        // Ambil user yang sedang login
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found'
            ], 404);
        }

        // Pastikan hanya pemilik transaksi yang boleh menghapus
        if ($transaction->customer_id != $user->id) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden - You are not allowed to delete this transaction'
            ], 403);
        }

        // Ambil data buku terkait
        $book = Book::find($transaction->book_id);

        // Jika buku ditemukan, kembalikan stok
        if ($book) {
            // Catatan: jika kamu menyimpan jumlah quantity, tambahkan ke stok sesuai quantity
            $book->stock += 1; // Sesuaikan jika kamu menyimpan quantity
            $book->save();
        }

        // Hapus transaksi
        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully'
        ]);
    }

}
