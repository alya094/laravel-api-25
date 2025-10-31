<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'birthdate'
    ];
protected $casts = [
    'birthdate' => 'date',];

    /**
     * Field yang disembunyikan saat JSON response
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'birthdate'  // Sembunyikan birthdate juga
    ];
    /**
     * Relasi One-to-Many: Author hasMany Books
     * Satu penulis dapat memiliki banyak buku
     */

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
