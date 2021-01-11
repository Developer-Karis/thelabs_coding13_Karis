<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use App\Models\Navbar;
use App\Models\Banner;
use App\Models\BannerCarous;
use App\Models\ServiceRapide;
use App\Models\HomePresentation;
use App\Models\HomeVideo;
use App\Models\HomeTestimonial;
use App\Models\HomeTeam;
use App\Models\HomeReady;
use App\Models\HomeContact;
use App\Models\Footer;
use App\Models\TeamStatic;
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
        $testimonials = HomeTestimonial::all();

        $numbers = range(1, 9);
        shuffle($numbers);

        $select = $presentations[0]->title;
        $start = Str::before($select, '(');
        $end = Str::after($select, ')');
        $slice = Str::between($select, '(', ')');

        $selectService = $servicesRapides[0]->main_title;
        $startService = Str::before($selectService, '(');
        $endService = Str::after($selectService, ')');
        $sliceService = Str::between($selectService, '(', ')');

        $linkVideo = substr($videos[0]->video, 0, strpos($videos[0]->video, "&"));
        
        $order = HomeTestimonial::orderBy('created_at', 'DESC')->get();
        
        $paginationServices = ServiceRapide::orderBy('id', 'DESC')->paginate(9);
        
        $teams = HomeTeam::all();
        
        $selectTeam = $teams[0]->title;
        $startTeam = Str::before($selectTeam, '(');
        $endTeam = Str::after($selectTeam, ')');
        $sliceTeam = Str::between($selectTeam, '(', ')');

        $readys = HomeReady::all();
        
        $contacts = HomeContact::all();

        $footers = Footer::all();

        $teamStatic = TeamStatic::all();
        $random1 = HomeTeam::all()->except($teamStatic[0]->home_teams->id)->random(1);
        $random2 = HomeTeam::all()->except([$teamStatic[0]->home_teams->id, $random1[0]->id])->random(1);

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
        'startService',
        'endService',
        'sliceService',
        'startTeam',
        'endTeam',
        'sliceTeam',
        'videos',
        'linkVideo',
        'testimonials', 
        'order',
        'teams',
        'readys',
        'contacts',
        'footers',
        'teamStatic',
        'random1',
        'random2')
        )->with('pagination', $paginationServices);
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

        if ($updateLogoSlogan->logo != 'logo.png') {
            Storage::disk('public')->delete('img/' . $updateLogoSlogan->logo);
            Storage::disk('public')->delete('img/small-' . $updateLogoSlogan->logo);
        }

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

        if ($updateImageCarous->imageCarous != '01.jpg' || $updateImageCarous->imageCarous != '02.jpg') {
            Storage::disk('public')->delete('img/' . $updateImageCarous->imageCarous);
        }

        $updateImageCarous->imageCarous = $request->file('newImageCarous')->hashName();
        $updateImageCarous->save();
        $request->file('newImageCarous')->storePublicly('img', 'public');
        return redirect('/banniere');
    }
    
    public function adminDeleteImageCarous(HomePage $homePage, $id) 
    {
        $updateImageCarous = BannerCarous::find($id);
        $updateImageCarous->delete(); 
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
        return redirect()->back()->with('success', 'Mise à jour effectué avec succès !');
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
        return redirect()->back()->with('success', 'Mise à jour effectué avec succès !');
    }

    public function adminShowTestimonials(HomePage $homePage) 
    {
        $testimonials = HomeTestimonial::all();
        $order = HomeTestimonial::orderBy('created_at', 'DESC')->get();
        return view('admin.home.testimonials.testimonials', compact('testimonials', 'order'));
    }

    public function adminEditTestimonial(HomePage $homePage, $id) 
    {
        $editTestimonial = HomeTestimonial::find($id);
        $testimonials = HomeTestimonial::all();
        return view('admin.home.testimonials.testimonialsEdit', compact('editTestimonial', 'testimonials'));
    }

    public function adminStoreTestimonial(HomePage $homePage, Request $request) 
    {
        $storeTestimonial = new HomeTestimonial();

        if ($request->radAnswer == 'avatar/01.jpg') {
            $storeTestimonial->avatar = 'avatar/01.jpg';        
        } else if ($request->radAnswer == 'avatar/02.jpg') {
            $storeTestimonial->avatar = 'avatar/02.jpg';        
        }

        $storeTestimonial->para = $request->newPara;
        $storeTestimonial->fullName = $request->newFullName;
        $storeTestimonial->function = $request->newFunction;
        $storeTestimonial->save();
        return redirect()->back();
    }

    public function adminUpdateTitleTestimonial(HomePage $homePage, Request $request, $id) 
    {
        $updateTitleTestimonial = HomeTestimonial::find($id);
        $updateTitleTestimonial->title = $request->title;
        $updateTitleTestimonial->save();
        return redirect()->back();
    }

    public function adminUpdateTestimonial(HomePage $homePage, Request $request, $id) 
    {
        $updateTestimonial = HomeTestimonial::find($id);
        
        if ($request->radAnswer == 'avatar/01.jpg') {
            $updateTestimonial->avatar = 'avatar/01.jpg';        
        } else if ($request->radAnswer == 'avatar/02.jpg') {
            $updateTestimonial->avatar = 'avatar/02.jpg';        
        }
        
        $updateTestimonial->para = $request->para;
        $updateTestimonial->fullName = $request->fullName;
        $updateTestimonial->function = $request->function;
        $updateTestimonial->save();
        return redirect('/testimonials');
    }

    public function adminDeleteTestimonial(HomePage $homePage, Request $request, $id) 
    {
        $deleteTestimonial = HomeTestimonial::find($id);
        $deleteTestimonial->delete();
        return redirect()->back();
    }

    public function adminShowServices(HomePage $homePage) 
    {
        $services = ServiceRapide::all();
        return view('admin.home.services.services', compact('services'));
    }

    public function adminStoreServices(HomePage $homePage, Request $request) 
    {
        $services = new ServiceRapide();
        $services->icon = $request->newService;
        $services->title = $request->newTitle;
        $services->para = $request->newPara;
        $services->save();
        return redirect()->back()->with('success', 'Ajout effectué avec succès !');
    }
    
    public function adminEditService(HomePage $homePage, Request $request, $id) 
    {
        $editService = ServiceRapide::find($id);
        $services = ServiceRapide::all();
        return view('admin.home.services.serviceEdit', compact('editService', 'services'));
    }

    public function adminUpdateTitleService(HomePage $homePage, Request $request, $id) 
    {
        $updateTitleService = ServiceRapide::find($id);
        $updateTitleService->main_title = $request->main_title;
        $updateTitleService->button = $request->button;
        $updateTitleService->save();
        return redirect()->back();
    }

    public function adminUpdateService(HomePage $homePage, Request $request, $id) 
    {
        $updateService = ServiceRapide::find($id);
        $updateService->icon = $request->changeService;
        $updateService->title = $request->changeTitle;
        $updateService->para = $request->changePara;
        $updateService->save();
        return redirect()->back()->with('success', 'Modification effectué avec succès !');
    }

    public function adminDeleteService(HomePage $homePage, $id) 
    {
        $deleteService = ServiceRapide::find($id);
        $deleteService->delete();
        return redirect()->back();
    }

    public function adminShowTeam(HomePage $homePage) 
    {
        $teams = HomeTeam::all();
        return view('admin.home.team.team', compact('teams'));  
    }

    public function adminStoreTeam(HomePage $homePage, Request $request) 
    {
        $storeTeam = new HomeTeam();

        if ($request->radAnswer == '1.jpg') {
            $storeTeam->imageTeam = '1.jpg';        
        } else if ($request->radAnswer == '2.jpg') {
            $storeTeam->imageTeam = '2.jpg';        
        } else if ($request->radAnswer == '3.jpg') {
            $storeTeam->imageTeam = '3.jpg';
        }

        $storeTeam->fullName = $request->newFullName;
        $storeTeam->function = $request->newFunction;
        $storeTeam->save();
        return redirect()->back();  
    }

    public function adminUpdateTitleTeam(HomePage $homePage, Request $request, $id) 
    {
        $updateTitleTeam = HomeTeam::find($id);
        $updateTitleTeam->title = $request->title;
        $updateTitleTeam->save();
        return redirect()->back();
    }

    public function adminEditTeam(HomePage $homePage, $id) 
    {
        $editTeam = HomeTeam::find($id);
        $teams = HomeTeam::all();
        return view('admin.home.team.teamEdit', compact('editTeam', 'teams'));
    }

    public function adminUpdateTeam(HomePage $homePage, Request $request, $id) 
    {
        $storeTeam = HomeTeam::find($id);

        if ($request->radAnswer == '1.jpg') {
            $storeTeam->imageTeam = '1.jpg';        
        } else if ($request->radAnswer == '2.jpg') {
            $storeTeam->imageTeam = '2.jpg';        
        } else if ($request->radAnswer == '3.jpg') {
            $storeTeam->imageTeam = '3.jpg';
        }

        $storeTeam->fullName = $request->changeFullName;
        $storeTeam->function = $request->changeFunction;
        $storeTeam->save();
        return redirect('/team');
    }

    public function adminUpdatePlaceTeam(HomePage $homePage, Request $request) 
    {
        $updatePlaceTeam = TeamStatic::all();
        $updatePlaceTeam[0]->delete();
        $newTeamStatic = new TeamStatic();
        $newTeamStatic->team_id = $request->team_id;
        $newTeamStatic->save();
        return redirect()->back();
    }

    public function adminDeleteTeam(HomePage $homePage, $id) 
    {
        $deleteTeam = HomeTeam::find($id);
        $deleteTeam->delete();
        return redirect()->back();
    }

    public function adminShowReady(HomePage $homePage) 
    {
        $readys = HomeReady::all();
        return view('admin.home.ready.ready', compact('readys'));
    }

    public function adminUpdateReady(HomePage $homePage, Request $request, $id) 
    {
        $updateReady = HomeReady::find($id);
        $updateReady->title = $request->title;
        $updateReady->sous_title = $request->sous_title;
        $updateReady->button = $request->button;
        $updateReady->save();
        return redirect()->back()->with('success', 'Modification effectué avec succès !');
    }

    public function adminShowContact(HomePage $homePage) 
    {
        $contacts = HomeContact::all();
        return view('admin.home.contact.contact', compact('contacts'));
    }

    public function adminUpdateContact(HomePage $homePage, Request $request, $id) 
    {
        $updateContact = HomeContact::find($id);
        $updateContact->title = $request->title;
        $updateContact->para = $request->para;
        $updateContact->mini_title = $request->mini_title;
        $updateContact->address = $request->address;
        $updateContact->postcode = $request->postcode;
        $updateContact->phone_number = $request->phone_number;
        $updateContact->website = $request->website;
        $updateContact->buttonForm = $request->buttonForm;
        $updateContact->save();
        return redirect()->back()->with('success', 'Modification effectué avec succès !');
    }

    public function adminShowFooter(HomePage $homePage) 
    {
        $footers = Footer::all();
        return view('admin.home.footer.footer', compact('footers'));
    }

    public function adminUpdateFooter(HomePage $homePage, Request $request, $id) 
    {
        $updateFooter = Footer::find($id);
        $updateFooter->para = $request->para;
        $updateFooter->author = $request->author;
        $updateFooter->save();
        return redirect()->back()->with('success', 'Modification effectué avec succès !');
    }
}
