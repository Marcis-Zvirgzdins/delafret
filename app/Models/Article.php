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

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
