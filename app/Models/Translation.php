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
    ]

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
