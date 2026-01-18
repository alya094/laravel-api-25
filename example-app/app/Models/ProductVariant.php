<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    //
    protected $fillable = ['name', 'product_id','description', 'price', 'stock', 'product_category_id'];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
