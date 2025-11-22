<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVarient extends Model
{
    use HasFactory;

    protected $table = 'product_varients';

    protected $fillable = [
        'product_id',
        'title',
        'varient_code',
        'slug',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productSound()
    {
        return $this->hasMany(ProductSound::class, 'variant_id', 'id');
    }
}
