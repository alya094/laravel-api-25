<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Product extends Model
{
    protected $fillable = ['name', 'product_category_id','description'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(CategoriProduct::class);
    }
}