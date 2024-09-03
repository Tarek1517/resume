<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\HeroHome;

class heroContents extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $heroHome = HeroHome::first();
        return view('pages.addhero', compact('heroHome'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        request()->validate([

            'title' => 'required | string',
            'sub_title' => 'required | string',
            'resume' => 'required',

        ]);

        $data = [];

        $data['title'] = $request->title;
        $data['sub_title'] = $request->sub_title;
        $data['status'] = $request->status;

        if ($request->file('bg_img')) {

            $img_file = $request->file('bg_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $data['bg_img'] = $image_full_name;

        }

        if ($request->file('resume')) {

            $pdf_file = $request->file('resume');
            $pdf_name = Str::random(20);
            $ext = strtolower($pdf_file->getClientOriginalExtension());
            $pdf_full_name = $pdf_name . '.' . $ext;
            $pdf_file->storeAs('public/resume/' . $pdf_full_name);
            $data['resume'] = $pdf_full_name;

        }

        $insertData = HeroHome::create($data);

        if ($insertData) {

            return redirect()->route('add_heroContent')->with('success', 'Home page Data has been updated successfully');

        } else {

            return redirect()->route('add_heroContent')->with('error', 'Home page Data is not updated');

        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {

        $HeroHome = HeroHome::all();
        return view('pages.listhero', compact('HeroHome'));
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
        $editHero = HeroHome::find($id);
        return view('pages.editherop', compact('editHero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        request()->validate([

            'title' => 'required | string',
            'sub_title' => 'required | string',

        ]);

        $data = [];

        $data['title'] = $request->title;
        $data['sub_title'] = $request->sub_title;
        $data['status'] = $request->status;

        if ($request->file('bg_img')) {

            $img_file = $request->file('bg_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $data['bg_img'] = $image_full_name;

        }

        if ($request->file('resume')) {

            $pdf_file = $request->file('resume');
            $pdf_name = Str::random(20);
            $ext = strtolower($pdf_file->getClientOriginalExtension());
            $pdf_full_name = $pdf_name . '.' . $ext;
            $pdf_file->storeAs('public/resume/' . $pdf_full_name);
            $data['resume'] = $pdf_full_name;

        }

        $insertData = HeroHome::find($id);

        $insertData->where('id', $id)->update($data);

        return redirect()->route('heroContent_List')->with('success', 'Home page Data has been updated successfully');

    }

    public function pending($id)
    {

        HeroHome::where('id', $id)->update(['status' => 'pending']);

        return redirect()->route('heroContent_List');

    }

    public function active($id)
    {

        HeroHome::where('status', 'active')->update(['status' => 'pending']);
        HeroHome::where('id', $id)->update(['status' => 'active']);

        // $updatePending->update(['status'=> 'active']);

        return redirect()->route('heroContent_List');

    }

    public function destroy($id)
    {

        $delete = HeroHome::find($id);
        $delete->where('id', $id)->delete();

        return redirect()->route('heroContent_List')->with('success', 'Data delete Successfully');

    }

}
