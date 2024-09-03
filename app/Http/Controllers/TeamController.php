<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\TeamContent;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['teamContents'] = TeamContent::get();
        return view("pages.team.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.team.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([

            'name' => 'required | string',
            'designation' => 'required | string',
            'person_img' => 'required',
            'facebook_link'=> 'required'

        ]);

        $data = [];

        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['person_img'] = $request->person_img;
        $data['facebook_link'] = $request->facebook_link;
        $data['twitter_link'] = $request->twitter_link;
        $data['insta_link'] = $request->insta_link;
        $data['linkedin_link'] = $request->linkedin_link;

        if ($request->file('person_img')) {

            $img_file = $request->file('person_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $data['person_img'] = $image_full_name;

        }

        

        $insertData = TeamContent::create($data);

    

        if ($insertData) {

            return redirect()->route('add_teamContent')->with('success', 'Team Page Data has been updated successfully');

        } else {

            return redirect()->route('add_teamContent')->with('error', 'Team page Data is not updated');

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
    public function edit(string $id)
    {
        $data = [];

        $data['editTeam'] = TeamContent::find($id);

        return view('pages.team.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([

            'name' => 'required | string',
            'designation' => 'required | string',
            'person_img' => 'required'

        ]);

        $data = [];

        $data['name'] = $request->name;
        $data['designation'] = $request->designation;
        $data['person_img'] = $request->person_img;
        $data['facebook_link'] = $request->facebook_link;
        $data['twitter_link'] = $request->twitter_link;
        $data['insta_link'] = $request->insta_link;
        $data['linkedin_link'] = $request->linkedin_link;

        if ($request->file('person_img')) {

            $img_file = $request->file('person_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $data['person_img'] = $image_full_name;

        }

        

        $insertData = TeamContent::where('id',$id)->update($data);

        if ($insertData) {

            return redirect()->route('teamContent_list')->with('success', 'Team Page Data has been updated successfully');

        } else {

            return redirect()->route('teamContent_list')->with('error', 'Team page Data is not updated');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TeamContent::where('id', $id)->delete();
        
        return redirect()->route('teamContent_list')->with('success', 'Data delete Successfully');
    }

    public function pendingMem($id)
    {

        TeamContent::where('id', $id)->update(['status' => 'pending']);

        return redirect()->route('teamContent_list');

    }

    public function activeMem($id)
    {

        TeamContent::where('id', $id)->update(['status' => 'active']);

        return redirect()->route('teamContent_list');

    }
}
