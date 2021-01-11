<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticle extends Model
{
    use HasFactory;

    public function blog_tags() 
    {
        return $this->belongsToMany('App\Models\BlogTag');
    }

    public function blog_categories() 
    {
        return $this->belongsToMany('App\Models\BlogCategories');
    }

    public function blog_article_tags() 
    {
        return $this->hasMany('App\Models\BlogArticleTag', 'article_id', 'id');
    }

    public function blog_article_categories() 
    {
        return $this->hasMany('App\Models\BlogArticleCategories', 'article_id', 'id');
    }
}
