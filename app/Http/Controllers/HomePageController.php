<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\BannerCarous;
use App\Models\ServiceRapide;
use App\Models\HomePresentation;
use App\Models\HomeVideo;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomePageController extends Controller
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
        $bannerCarous = BannerCarous::all();
        $servicesRapides = ServiceRapide::all();
        $presentations = HomePresentation::all();
        $videos = HomeVideo::all();

        $numbers = range(1, 9);
        shuffle($numbers);

        $select = $presentations[0]->title;
        $start = Str::before($select, '(');
        $end = Str::after($select, ')');
        $slice = Str::between($select, '(', ')');
        return view('labs.home', 
        compact(
        'navbars', 
        'banners', 
        'bannerCarous', 
        'servicesRapides', 
        'numbers', 
        'presentations', 
        'start', 
        'end', 
        'slice',
        'videos')
        );
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
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show(HomePage $homePage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homePage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomePage $homePage)
    {
        //
    }

    public function adminShowBanniere(HomePage $homePage) 
    {
        $banners = Banner::all();
        $bannersCarous = BannerCarous::all();
        return view('admin.home.banniere.banniere', compact('banners', 'bannersCarous'));
    }

    public function adminAddImageCarous(HomePage $homePage, Request $request) 
    {
        $createImageCarous = new BannerCarous();
        $createImageCarous->imageCarous = $request->file('newImageCarous')->hashName();
        $createImageCarous->save();
        $request->file('newImageCarous')->storePublicly('img', 'public');
        return redirect()->back();
    }
    
    public function adminUpdateLogoSlogan(HomePage $homePage, Request $request, $id) 
    {
        $updateLogoSlogan = Banner::find($id);
        $updateLogoSlogan->logo = $request->file('updateImageLogo')->hashName();
        $updateLogoSlogan->slogan = $request->updateSlogan;
        $updateLogoSlogan->save();
        $request->file('updateImageLogo')->storePublicly('img', 'public');
        $img = Image::make('img/'.$updateLogoSlogan->logo)->resize(100,80);
        $img->save('img/small-'.$updateLogoSlogan->logo);
        return redirect()->back();
    }

    public function adminEditCarous(HomePage $homePage, $id) 
    {
        $editCarous = BannerCarous::find($id);
        return view('admin.home.banniere.banniereEdit', compact('editCarous'));
    }

    public function adminUpdateImageCarous(HomePage $homePage, Request $request, $id) 
    {
        $updateImageCarous = BannerCarous::find($id);
        $updateImageCarous->imageCarous = $request->file('newImageCarous')->hashName();
        $updateImageCarous->save();
        $request->file('newImageCarous')->storePublicly('img', 'public');
        return redirect('/banniere');
    }
    
    public function adminShowServicesRapides(HomePage $homePage) 
    {
        $servicesRapides = ServiceRapide::all();

        $numbers = range(1, 9);
        shuffle($numbers);
        return view('admin.home.servicesRapides.servicesRapides', compact('servicesRapides', 'numbers'));
    }

    public function adminShowPresentation(HomePage $homePage) 
    {
        $presentations = HomePresentation::all();
        return view('admin.home.presentation.presentation', compact('presentations'));
    }

    public function adminUpdatePresentation(HomePage $homePage, Request $request, $id) 
    {
        $updatePresentation = HomePresentation::find($id);
        $updatePresentation->title = $request->title;        
        $updatePresentation->para1 = $request->para1;
        $updatePresentation->para2 = $request->para2;
        $updatePresentation->button = $request->buttonPresentation;
        $updatePresentation->save();
        Session::flash('success');
        return redirect()->back();
    }

    public function adminShowVideo(HomePage $homePage) 
    {
        $videos = HomeVideo::all();
        return view('admin.home.video.video', compact('videos'));
    }

    public function adminUpdateVideo(HomePage $homePage, Request $request, $id) 
    {
        $updateVideo = HomeVideo::find($id);
        $updateVideo->video = $request->linkVideo;
        $updateVideo->save();
        return redirect()->back();
    }
}
