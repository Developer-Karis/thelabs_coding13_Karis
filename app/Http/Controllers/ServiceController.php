<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\ServiceRapide;
use App\Models\BannerHeader;
use App\Models\HomePresentation;
use App\Models\HomeContact;
use App\Models\Footer;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        $servicesRapides = ServiceRapide::all();

        $selectService = $servicesRapides[0]->main_title;
        $startService = Str::before($selectService, '(');
        $endService = Str::after($selectService, ')');
        $sliceService = Str::between($selectService, '(', ')');

        $paginationServices = ServiceRapide::orderBy('id', 'DESC')->paginate(9);

        $bannerHeader = BannerHeader::all();

        $presentations = HomePresentation::all();
        
        $select = $presentations[0]->title;
        $start = Str::before($select, '(');
        $end = Str::after($select, ')');
        $slice = Str::between($select, '(', ')');

        $servicesPrimes = ServiceRapide::orderBy('id', 'DESC')->take(3)->get();
        $servicesPrimes2 = ServiceRapide::orderBy('id', 'DESC')->skip(3)->take(3)->get();

        $contacts = HomeContact::all();

        $footers = Footer::all();

        $blogArticles = Blog::orderBy('id', 'DESC')->take(3)->get();

        return view('labs.services', 
        compact(
        'navbars', 
        'banners', 
        'servicesRapides', 
        'startService', 
        'endService', 
        'sliceService', 
        'paginationServices',
        'bannerHeader',
        'presentations',
        'start',
        'end',
        'slice',
        'servicesPrimes',
        'servicesPrimes2',
        'contacts',
        'footers',
        'blogArticles'
        ))->with('pagination', $paginationServices);
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }

    public function adminShowBannerHeaderService(Service $service) 
    {
        $bannerHeader = BannerHeader::all();
        return view('admin.services.banniere', compact('bannerHeader'));
    }

    public function adminUpdateBannerHeaderService(Service $service, Request $request, $id) 
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
