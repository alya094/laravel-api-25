<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $books = [
        // Andrea Hirata (author_id: 1) - 1 buku
        ['title' => 'Laskar Pelangi', 'author_id' => 1, 'published_year' => 2005, 'genre' => 'Novel'],
       // Tere Liye (author_id: 2) - 3 buku
        ['title' => 'Bumi', 'author_id' => 2, 'published_year' => 2014, 'genre' => 'Fantasy'],
        ['title' => 'Bulan', 'author_id' => 2, 'published_year' => 2015, 'genre' => 'Fantasy'],
        ['title' => 'Matahari', 'author_id' => 2, 'published_year' => 2016, 'genre' => 'Fantasy'],
        // Dee Lestari (author_id: 3) - 2 buku
        ['title' => 'Supernova: Kesatria,putri dan bintang jatuh', 'author_id' => 3, 'published_year' => 2001, 'genre' => 'Science Fiction '],
        ['title' => 'Perahu Kertas', 'author_id' => 3, 'published_year' => 2009, 'genre' => 'Romance '],    
        // Pidi Baiq (author_id: 4) - 2 buku
        ['title' => 'Bintang di Jakarta', 'author_id' => 4, 'published_year' => 2008, 'genre' => 'Novel'],
        ['title' => 'Bidadari di Jakarta', 'author_id' => 4, 'published_year' => 2009, 'genre' => 'Novel'],
        // Raditya Dika (author_id: 5) - 2 buku
        ['title' => 'kambing jantan ', 'author_id' => 5, 'published_year' => 2005, 'genre' => 'Comedy'],
        ['title' => 'cinta brontosaurus', 'author_id' => 5, 'published_year' => 2006, 'genre' => 'Comedy'],
    ];
    foreach ($books as $book) {
        Book::create($book);
    }
}
}