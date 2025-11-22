<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laser extends Model
{
    use HasFactory;

    protected $table = 'lasers';
    protected $fillable = [
        'title',
        'image',
        'status',
    ];
    protected $casts = [
        'status' => 'boolean',
    ];
}
