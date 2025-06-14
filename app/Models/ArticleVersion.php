<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleVersion extends Model
{
    public const UPDATED_AT = null;
    public const CREATED_AT = 'version_created_at';

    protected $fillable = [
        'article_id',
        'title',
        'thumbnail_text',
        'content',
        'author',
        'revised_by_user_id',
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function reviser()
    {
        return $this->belongsTo(User::class, 'revised_by_user_id');
    }
}
