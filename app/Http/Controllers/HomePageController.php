<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\BannerCarous;
use App\Models\ServiceRapide;
use App\Models\HomePresentation;
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

        $numbers = range(1, 9);
        shuffle($numbers);
        return view('labs.home', compact('navbars', 'banners', 'bannerCarous', 'servicesRapides', 'numbers'));
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
        $request->file('newImageCarous')->storePublicly('images', 'public');
        return redirect()->back();
    }

    public function adminEditLogoSlogan(HomePage $homePage, $id) 
    {
        $edit = Banner::find($id);
        $editCarous = BannerCarous::find($id);
        return view('admin.home.banniere.banniereEdit', compact('edit', 'editCarous'));
    }

    public function adminUpdateLogoSlogan(HomePage $homePage, Request $request, $id) 
    {
        $updateLogoSlogan = Banner::find($id);
        $updateLogoSlogan->logo = $request->file('updateImageLogo')->hashName();
        $updateLogoSlogan->slogan = $request->updateSlogan;
        $updateLogoSlogan->save();
        $request->file('updateImageLogo')->storePublicly('images', 'public');
        return redirect()->back();
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
}
