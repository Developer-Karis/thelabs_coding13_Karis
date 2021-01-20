<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\BannerHeader;
use App\Models\Footer;
use App\Models\Tag;
use App\Models\Categorie;
use App\Models\Blog;
use App\Models\Commentary;
use Auth;
use DateTime;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $commentary = new Commentary();
        $commentary->photo_profil = Auth::user()->photo;
        $commentary->fullname = Auth::user()->name;
        $dateToday = new DateTime();
        $date = $dateToday->format('Y-m-d') . ' | Reply';
        $commentary->title = $date;
        $commentary->message = $request->message;
        $commentary->article_id = $request->article_id;
        $commentary->user_id = Auth::user()->id;
        $commentary->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPost $blogPost, $id)
    {
        $blogArticle = Blog::find($id);

        $navbars = Navbar::all();
        $banners = Banner::all();
        $bannerHeader = BannerHeader::all();
        $footers = Footer::all();

        $tags = Tag::all();
        $categories = Categorie::all();

        $commentaries = Commentary::all();

        $countCommentaries = Commentary::where('article_id', $blogArticle->id)->count();
        
        return view('labs.blog-post', 
        compact(
        'navbars', 
        'banners', 
        'bannerHeader', 
        'footers', 
        'tags', 
        'categories', 
        'blogArticle', 
        'commentaries', 
        'countCommentaries'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blogPost)
    {
        //
    }
}
