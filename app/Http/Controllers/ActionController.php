<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\callAction;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actionList = callAction::get();

        return view('pages.calltoaction.index', compact('actionList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.calltoaction.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([

            'title' => 'required | string',
            'action_description' => 'required | string',

        ]);

        $data = [];

        $data['title'] = $request->title;
        $data['action_description'] = $request->action_description;

        if ($request->file('bg_img')) {

            $img_file = $request->file('bg_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $data['bg_img'] = $image_full_name;

        }

        $insertData = callAction::create($data);

        if ($insertData) {

            return redirect()->route('add_callActionContent')->with('success', 'Call to Action Data has been updated successfully');

        } else {

            return redirect()->route('add_callActionContent')->with('error', 'Home page Data is not updated');

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
        $editAction = callAction::find($id);
        return view('pages.calltoaction.edit', compact('editAction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([

            'title' => 'required | string',

        ]);

        $data = [];

        $data['title'] = $request->title;
        $data['action_description'] = $request->action_description;
        

        if ($request->file('bg_img')) {

            $img_file = $request->file('bg_img');
            $image_name = Str::random(20);
            $ext = strtolower($img_file->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $img_file->storeAs('public/img/' . $image_full_name);
            $data['bg_img'] = $image_full_name;

        }


        $insertData = callAction::find($id);

        $insertData->where('id', $id)->update($data);

        return redirect()->route('callActionContent_list')->with('success', 'Home page Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = callAction::find($id);
        $delete->where('id', $id)->delete();

        return redirect()->route('callActionContent_list')->with('success', 'Data delete Successfully');
    }

    public function PendingAction($id)
    {

        $active = callAction::find($id)->where('status', 'active')->first();

        if ($active) {

            callAction::where('status', 'active')->update(['status' => 'pending']);

            return redirect()->route('callActionContent_list')->with('error', 'One item must be Active');

        }

        callAction::where('id', $id)->update(['status' => 'pending']);

        return redirect()->route('callActionContent_list');

    }

    public function ActiveAction($id)
    {

        callAction::where('status', 'active')->update(['status' => 'pending']);
        callAction::where('id', $id)->update(['status' => 'active']);

        // $updatePending->update(['status'=> 'active']);

        return redirect()->route('callActionContent_list');

    }
}
