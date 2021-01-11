<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\BannerHeader;
use App\Models\HomeContact;
use App\Models\Footer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ContactController extends Controller
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

        $contacts = HomeContact::all();

        $contact = Contact::all();

        $footers = Footer::all();
        
        return view('labs.contact', 
        compact(
        'navbars',
        'banners',
        'bannerHeader',
        'contacts',
        'footers',
        'contact'
        ));
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
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function adminShowBannerHeaderContact(Contact $contact) 
    {
        $bannerHeader = BannerHeader::all();
        return view('admin.contact.banniere', compact('bannerHeader'));
    }

    public function adminUpdateBannerHeaderContact(Contact $contact, Request $request, $id) 
    {
        $updateBannerHeaderContact = BannerHeader::find($id);

        $request->validate([
            'title' => 'min:5',
        ]);

        $updateBannerHeaderContact->title = $request->title;
        $updateBannerHeaderContact->lienPrecedent = $request->lienPrecedent;
        $updateBannerHeaderContact->lienActuel = $request->lienActuel;
        $updateBannerHeaderContact->save();
        return redirect()->back()->with('success', 'Modification effectué avec succès !');
    }

    public function adminShowGoogleMap(Contact $contact) 
    {
        $contact = Contact::all();
        return view('admin.contact.googleMap', compact('contact'));
    }

    public function adminUpdateGoogleMap(Contact $contact, Request $request, $id) 
    {
        $updateGoogleMap = Contact::find($id);
        $updateGoogleMap->nom = $request->nom;

        $selectAddress = $updateGoogleMap->address;
        $start = Str::before($selectAddress, 'q=');
        $end = Str::after($selectAddress, '&t');
        $slice = Str::between($selectAddress, 'q=', '&t');
        $myAdress = $updateGoogleMap->nom;
        $concatAll = $start . 'q=' . $myAdress . '&t' . $end;

        $updateGoogleMap->address = $concatAll;

        $updateGoogleMap->save();
        return redirect()->back()->with('success', 'Modification effectué avec succès !');
    }
}
