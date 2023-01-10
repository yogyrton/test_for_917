<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'status',
        'author',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
