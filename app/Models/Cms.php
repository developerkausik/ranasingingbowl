<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;

    protected $table = 'cms';

    protected $fillable = [
        'language_id',
        'page_name',
        'title',
        'description'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id', 'id');
    }
}
