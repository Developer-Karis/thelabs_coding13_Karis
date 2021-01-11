<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticleTag extends Model
{
    use HasFactory;

    public function blog_article() 
    {
        return $this->belongsTo('App\Models\BlogArticle');
    }

    public function blog_tags() 
    {
        return $this->belongsTo('App\Models\BlogTag', 'tag_id');
    }
}
