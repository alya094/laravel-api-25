<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    /**
     * Menampilkan daftar buku beserta informasi penulisnya
     */
    public function index(): JsonResponse
    {
        $books = Book::with(relations:'author')->get();
        return response()->json(
            data: $books);
    }   

    /**
     * Menampilkan detail buku beserta informasi penulisnya
     */
    public function show($id): JsonResponse
    {
        $book = Book::with('author')->find($id);
        if (!$book) {
            return response()->json([
                'message' => 'Buku tidak ditemukan',
                'success' => false
            ], 404);
        }
        return response()->json([
            'data' => $book,
            'message' => 'Detail Buku berhasil diambil',
            'success' => true
        ]);
    }   
}
