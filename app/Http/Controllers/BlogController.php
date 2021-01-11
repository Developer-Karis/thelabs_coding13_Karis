<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\BannerHeader;
use App\Models\Footer;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navbars = Navbar::all();
        $banners = Banner::all();
        $bannerHeader = BannerHeader::all();
        $footers = Footer::all();
        return view('labs.blog', compact('navbars', 'banners', 'bannerHeader', 'footers'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function adminShowBannerHeaderBlog(Blog $blog) 
    {
        $bannerHeader = BannerHeader::all();
        return view('admin.blog.banniere', compact('bannerHeader'));
    }

    public function adminUpdateBannerHeaderBlog(Blog $blog, Request $request, $id) 
    {
        $updateBannerHeaderService = BannerHeader::find($id);

        $request->validate([
            'title' => 'min:5',
        ]);

        $updateBannerHeaderService->title = $request->title;
        $updateBannerHeaderService->lienPrecedent = $request->lienPrecedent;
        $updateBannerHeaderService->lienActuel = $request->lienActuel;
        $updateBannerHeaderService->save();
        return redirect()->back()->with('success', 'Modification effectué avec succès !');
    }
}
