<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'thumbnail',
        'category',
        'content',
        'author',
        'thumbnail_text',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
