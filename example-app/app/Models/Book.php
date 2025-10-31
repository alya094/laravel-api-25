<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
         'author_id',
          'published_year', 
          'genre'
        ];
    protected $casts = [
        'published_year' => 'integer',
    ];
    /**
     * Field yang disembunyikan saat JSON response
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
   
     /**
     * Relasi One-to-Many: Book belongsTo Author
     * Satu buku dimiliki oleh satu penulis
     */

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}