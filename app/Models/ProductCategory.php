<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_categories';

    protected $fillable = [
        'title',
        'slug',
        'sort_order',
        'status'
    ];
    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
