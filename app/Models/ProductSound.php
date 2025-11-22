<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSound extends Model
{
    use HasFactory;

    protected $table = 'product_sounds';

    protected $fillable = [
        'product_id',
        'variant_id',
        'sound'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function variant()
    {
        return $this->belongsTo(ProductVarient::class, 'variant_id', 'id');
    }
}
