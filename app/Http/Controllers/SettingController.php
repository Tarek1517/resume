<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\setting;
use \App\Models\StoreLogo;
use \App\Models\addFooter;

class SettingController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [];

        $data['settings'] = setting::get();

        return view("pages.setting.add", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request)
    {
        request()->validate([

            'Portfolio_title' => 'required | string',
            'Portfolio_SubTitle' => 'required | string',
            'team_title' => 'required | string',
            'team_SubTitle' => 'required | string',
            'contact_title' => 'required | string',
            'contact_SubTitle' => 'required | string',

        ]);

        $data = [];

        $data['Portfolio_title'] = $request->Portfolio_title;
        $data['Portfolio_SubTitle'] = $request->Portfolio_SubTitle;
        $data['team_title'] = $request->team_title;
        $data['team_SubTitle'] = $request->team_SubTitle;
        $data['contact_title'] = $request->contact_title;
        $data['contact_SubTitle'] = $request->contact_SubTitle;

        $insertData = setting::first()->update($data);

        if ($insertData) {

            return redirect()->route('add_SettingContent')->with('success', 'Setting Page Data has been updated successfully');

        } else {

            return redirect()->route('add_SettingContent')->with('error', 'Setting page Data is not updated');

        }

    }

    public function createLogo()
    {

        $data = [];

        $data['LogoAdd'] = StoreLogo::get();

        return view("pages.setting.logo", $data);

    }

    public function logo_Add(Request $request)
    {


        $data = [];

        if ($request->file('logo')) {

            $img_file = $request->file('logo');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $data['logo'] = $image_full_name;

        }


        $insertData = StoreLogo::first()->update($data);

        if ($insertData) {

            return redirect()->route('Logo_Change')->with('success', 'Team Page Data has been updated successfully');

        } else {

            return redirect()->route('Logo_Change')->with('error', 'Team page Data is not updated');

        }

    }

    public function createFooter()
    {

        $data = [];

        $data['LogoAdd'] = addFooter::get();

        return view("pages.setting.footer", $data);

    }

    public function updateFooter(Request $request)
    {
        request()->validate([

            'site_name' => 'required | string',
            'design_name' => 'required | string',
            'design_link' => 'required | string',

        ]);

        $data = [];

        $data['site_name'] = $request->site_name;
        $data['design_name'] = $request->design_name;
        $data['design_link'] = $request->design_link;

        $insertData = addFooter::first()->update($data);

        if ($insertData) {

            return redirect()->route('footer_Section')->with('success', 'Footer Page Data has been updated successfully');

        } else {

            return redirect()->route('footer_Section')->with('error', 'Footer page Data is not updated');

        }

    }

}
