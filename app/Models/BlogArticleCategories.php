<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogArticleCategories extends Model
{
    use HasFactory;

    public function blog_article() 
    {
        return $this->belongsTo('App\Models\BlogArticle');
    }

    public function blog_categories() 
    {
        return $this->belongsTo('App\Models\BlogCategories', 'categorie_id');
    }
}
