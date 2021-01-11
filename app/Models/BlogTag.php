<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

    public function blog_article() 
    {
        return $this->belongsToMany('App\Models\BlogArticle');
    }

    public function blog_article_tags() 
    {
        return $this->hasMany('App\Models\BlogArticleTag');
    }
}
