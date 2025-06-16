<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'article_id',
        'language',
        'title',
        'content',
        'author',
        'thumbnail_text',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}