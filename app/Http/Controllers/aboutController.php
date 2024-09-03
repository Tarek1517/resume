<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\AboutContent;
use \App\Models\AboutFeatures;

class aboutController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $aboutList = AboutContent::with('AboutFeatures')->get();

        return view('pages.aboutus.index', compact('aboutList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.aboutus.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([

            'title' => 'required | string',
            'description' => 'required | string',
            'image_path' => 'required',
            'features_title' => 'required|array',
            'features_description' => 'required|array',
            'features_icon' => 'required|array',

        ]);

        $features_title = $request->features_title;
        $features_description = $request->features_description;
        $features_icon = $request->features_icon;

        $aboutData = [];

        $aboutData['title'] = $request->title;
        $aboutData['description'] = $request->description;

        if ($request->file('image_path')) {

            $img_file = $request->file('image_path');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $aboutData['image_path'] = $image_full_name;

        }

        $about = AboutContent::create($aboutData);

        $featuresDataFinal = [];

        if (isset($about->id)) {
            foreach ($features_title as $key => $title) {
                $featuresDataFinal[] = [
                    'about_id' => $about->id,
                    'features_title' => $title,
                    'features_description' => $features_description[$key],
                    'features_icon' => $features_icon[$key],
                ];
            }
        }

        foreach ($featuresDataFinal as $features) {
            $features = AboutFeatures::create($features);
        }

        if ($about && $features) {

            return redirect()->route('add_aboutContent')->with('success', 'About us  page Data has been save successfully');

        } else {

            return redirect()->route('add_aboutContent')->with('error', 'About us page Data is not save');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [];

        $data['editAbout'] = AboutContent::with('AboutFeatures')->find($id);

        return view('pages.aboutus.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([

            'title' => 'required | string',
            'description' => 'required | string',

        ]);

        $features_title = $request->features_title;
        $features_description = $request->features_description;
        $features_icon = $request->features_icon;
        $features_id = $request->features_id;

        $aboutData = [];

        $aboutData['title'] = $request->title;
        $aboutData['description'] = $request->description;

        if ($request->file('image_path')) {

            $img_file = $request->file('image_path');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $aboutData['image_path'] = $image_full_name;

        }

        $aboutID = AboutContent::where('id', $id)->update($aboutData);

        $featuresDataFinal = [];

        if ($aboutID) {
            foreach ($features_title as $key => $title) {
                $featuresDataFinal[] = [
                    'about_id' => $id,
                    'features_title' => $title,
                    'features_description' => $features_description[$key],
                    'features_icon' => $features_icon[$key],

                ];
            }
        }

        // dd($featuresDataFinal);

        foreach ($featuresDataFinal as $key => $features) {
            $featureId = $features_id[$key];
            AboutFeatures::where(['id' => $featureId, 'about_id' => $id])->update($features);

        }

        if ($aboutID) {

            return redirect()->route('aboutContent_list')->with('success', 'About us  page Data has been updated successfully');

        } else {

            return redirect()->route('aboutContent_list')->with('error', 'About us page Data is not updated');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $delete = AboutContent::find($id);
        $delete->where('id', $id)->delete();

        $delete->aboutFeatures()->delete();

        return redirect()->route('aboutContent_list')->with('success', 'Data delete Successfully');
    }

    public function AboutPending($id)
    {

        AboutContent::where('id', $id)->update(['status' => 'pending']);

        return redirect()->route('aboutContent_list');

    }

    public function AboutActive($id)
    {

        AboutContent::where('status', 'active')->update(['status' => 'pending']);
        AboutContent::where('id', $id)->update(['status' => 'active']);

        // $updatePending->update(['status'=> 'active']);

        return redirect()->route('aboutContent_list');

    }
}
