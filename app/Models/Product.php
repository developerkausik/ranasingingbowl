<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'status',
        'latest_product',
        'new_product'
    ];

    protected $casts = [
        'status' => 'boolean',
        'latest_product' => 'boolean',
        'new_product' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function varients(){
        return $this->hasMany(ProductVarient::class, 'product_id', 'id');
    }

    public function sounds()
    {
        return $this->hasMany(ProductSound::class, 'product_id', 'id');
    }

}
