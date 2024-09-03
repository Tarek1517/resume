<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\HeroHome;
use \App\Models\AboutContent;
use \App\Models\factContent;
use \App\Models\serviceContent;
use \App\Models\callAction;
use \App\Models\portfolioCategories;
use \App\Models\Portfolio;
use \App\Models\TeamContent;
use \App\Models\ContactInfo;
use \App\Models\setting;
use \App\Models\StoreLogo;
use \App\Models\addFooter;




class Home extends Controller
{
    public function __construct(Request $request)
    {
        
    }

    public function index() {
        $data = [];
        $data['heroHome'] = HeroHome::where('status', 'active')->first();
        $data['about'] = AboutContent::with('AboutFeatures')->where('status', 'active')->first();
        $data['fact'] = factContent::with('factFeatures')->where('status', 'active')->first();
        $data['service'] = serviceContent::with('serviceFeatures')->where('status', 'active')->first();
        $data['actionSection'] = callAction::where('status', 'active')->first();
        $data['categories'] = portfolioCategories::get();
        $data['portfolios'] = Portfolio::with('categories')->get();
        $data['TeamData'] = TeamContent::where('status', 'active')->get();
        $data['ContactData'] = ContactInfo::where('status', 'active')->get();
        $data['settings'] = setting::get();
        $data['logoAdd'] = StoreLogo::get();
        $data['footerSection'] = addFooter::get();
        

        // dd($data['TeamData']);
        
        return view('frontend.master', $data);
    }

}
