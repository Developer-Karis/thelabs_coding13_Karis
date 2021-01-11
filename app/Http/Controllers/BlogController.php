<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\BannerHeader;
use App\Models\Footer;
use App\Models\BlogTag;
use App\Models\BlogCategories;
use App\Models\BlogArticle;
use Illuminate\Support\Facades\Storage;
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
        $tags = BlogTag::all();
        $categories = BlogCategories::all();
        $blogArticles = BlogArticle::all();

        $paginationArticles = BlogArticle::orderBy('id', 'DESC')->paginate(1);

        return view('labs.blog', 
        compact(
        'navbars', 
        'banners', 
        'bannerHeader', 
        'footers', 
        'tags', 
        'categories', 
        'blogArticles'
        ))->with('pagination', $paginationArticles);
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
    
    public function adminShowArticles(Blog $blog) 
    {
        $articles = BlogArticle::all();
        return view('admin.blog.articles', compact('articles'));
    }

    public function adminCreateArticle(Blog $blog, Request $request) 
    {
        $storeArticle = new BlogArticle();
        $storeArticle->image = $request->file('newImageArticle')->hashName();
        $storeArticle->date = $request->newDate;
        $storeArticle->titre = $request->newTitre;
        $storeArticle->auteur = $request->newAuteur;
        $storeArticle->texte = $request->newTexte;
        $storeArticle->photo_profil = $request->file('newPhotoProfil')->hashName();
        $storeArticle->texte_auteur = $request->newTexteAuteur;
        $storeArticle->fonction = $request->newFonction;
        $storeArticle->description = $request->newDescription;
        $storeArticle->save();
        $request->file('newImageArticle')->storePublicly('img', 'public');
        $request->file('newPhotoProfil')->storePublicly('img', 'public');
        return redirect()->back()->with('success', 'Ajout effectué avec succès !');
    }

    public function adminShowEditArticle(Blog $blog, $id) 
    {
        $editArticle = BlogArticle::find($id);
        return view('admin.blog.articleEdit', compact('editArticle'));
    }

    public function adminUpdateArticle(Blog $blog, Request $request, $id) 
    {
        $updateArticle = BlogArticle::find($id);

        if ($updateArticle->image != 'blog-2.jpg') {
            Storage::disk('public')->delete('img/' . $updateArticle->image);
        }

        $updateArticle->image = $request->file('changeImageArticle')->hashName();
        $updateArticle->date = $request->changeDate;
        $updateArticle->titre = $request->changeTitre;
        $updateArticle->auteur = $request->changeAuteur;
        $updateArticle->texte = $request->changeTexte;
        $updateArticle->photo_profil = $request->file('changePhotoProfil')->hashName();
        $updateArticle->texte_auteur = $request->changeTexteAuteur;
        $updateArticle->fonction = $request->changeFonction;
        $updateArticle->description = $request->changeDescription;
        $updateArticle->save();
        $request->file('changeImageArticle')->storePublicly('img', 'public');
        $request->file('changePhotoProfil')->storePublicly('img', 'public');
        return redirect('/articles');
    }

    public function adminDeletetArticle(Blog $blog, $id) 
    {
        $deleteArticle = BlogArticle::find($id);
        $deleteArticle->delete();
        return redirect()->back();
    }

    public function adminShowCategories(Blog $blog) 
    {
        $categories = BlogCategories::all();
        return view('admin.blog.categories', compact('categories'));
    }

    public function adminCreateCategorie(Blog $blog, Request $request) 
    {
        $newCategorie = new BlogCategories();
        $newCategorie->nom = $request->nom;
        $newCategorie->save();
        return redirect()->back()->with('success', 'Ajout effectuée avec succès !');
    }

    public function adminEditCategorie(Blog $blog, $id) 
    {
        $editCategorie = BlogCategories::find($id);
        return view('admin.blog.categorieEdit', compact('editCategorie'));
    }

    public function adminUpdateCategorie(Blog $blog, Request $request, $id) 
    {
        $updateCategorie = BlogCategories::find($id);
        $updateCategorie->nom = $request->changeNom;
        $updateCategorie->save();
        return redirect()->back()->with('success', 'Modification effectuée avec succès !');
    }

    public function adminDeleteCategorie(Blog $blog, Request $request, $id) 
    {
        $updateCategorie = BlogCategories::find($id);
        $updateCategorie->delete();
        return redirect('/categories');
    }

    public function adminDeleteArticle(Blog $blog, $id) 
    {
        $deleteArticle = BlogArticle::find($id);
        $deleteArticle->delete();
        return redirect()->back();
    }

    public function adminShowTags(Blog $blog) 
    {
        $tags = BlogTag::all();
        return view('admin.blog.tags', compact('tags'));
    }

    public function adminCreateTag(Blog $blog, Request $request) 
    {
        $newTag = new BlogTag();
        $newTag->nom = $request->nom;
        $newTag->save();
        return redirect()->back()->with('success', 'Ajout effectuée avec succès !');
    }

    public function adminEditTag(Blog $blog, $id) 
    {
        $editTag = BlogTag::find($id);
        return view('admin.blog.tagEdit', compact('editTag'));
    }

    public function adminUpdateTag(Blog $blog, Request $request, $id) 
    {
        $updateTag = BlogTag::find($id);
        $updateTag->nom = $request->changeTag;
        $updateTag->save();
        return redirect()->back()->with('success', 'Modification effectuée avec succès !');
    }

    public function adminDeleteTag(Blog $blog, Request $request, $id) 
    {
        $updateTag = BlogTag::find($id);
        $updateTag->delete();
        return redirect('/tags');
    }
}
