<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\factContent;
use \App\Models\factFeatures;

class factsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $factList = factContent::with('factFeatures')->get();

        return view('pages.facts.index', compact('factList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.facts.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([

            'title' => 'required | string',
            'sub_title' => 'required | string',
            'count_title' => 'required | array',
            'count_subTitle' => 'required | array',
        ]);

        $factData = [];

        $factData['title'] = $request->title;
        $factData['sub_title'] = $request->sub_title;

        $factID = factContent::create($factData);


        

        $count_title = $request->count_title;
        $count_subTitle = $request->count_subTitle;

        $factFinalData = [];

        if(isset($factID->id)){

            foreach ($count_title as $key => $title) {

                $factFinalData[] = [
                    'fact_id' => $factID->id,
                    'count_title' => $title,
                    'count_subTitle' => $count_subTitle[$key],
                ];
            }

        }

        

        foreach ($factFinalData as $factFeatures) {
            $factFeatures = factFeatures::create($factFeatures);
        }

        if ($factID ) {

            return redirect()->route('add_factsContent')->with('success', 'Fact page Data has been save successfully');

        } else {

            return redirect()->route('add_factsContent')->with('error', 'Fact us page Data is not save');

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

        $data['editFacts'] = factContent::with('factFeatures')->find($id);

        return view('pages.facts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([

            'title' => 'required | string',
            'sub_title' => 'required | string',

        ]);

        $factData = [];

        $factData['title'] = $request->title;
        $factData['sub_title'] = $request->sub_title;


        $factID = factContent::where('id', $id)->update($factData);

        $count_title = $request->count_title;
        $count_subTitle = $request->count_subTitle;
        $features_id = $request->features_id;

        $featuresDataFinal = [];

        if ($factID) {
            foreach ($count_title as $key => $title) {
                $featuresDataFinal[] = [
                    'fact_id' => $id,
                    'count_title' => $title,
                    'count_subTitle' => $count_subTitle[$key],

                ];
            }
        }

        // dd($featuresDataFinal);

        foreach ($featuresDataFinal as $key => $features) {
            $featureId = $features_id[$key];
            factFeatures::where(['id' => $featureId, 'fact_id' => $id])->update($features);

        }

        if ($factID) {

            return redirect()->route('factsContent_list')->with('success', 'About us  page Data has been updated successfully');

        } else {

            return redirect()->route('factsContent_list')->with('error', 'About us page Data is not updated');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = factContent::find($id);
        $delete->where('id', $id)->delete();

        $delete->factFeatures()->delete();

        return redirect()->route('factsContent_list')->with('success', 'Data delete Successfully');
    }

    public function factPending($id)
    {

        $active = factContent::find($id)->where('status', 'active')->first();

        if ($active) {

            factContent::where('status', 'active')->update(['status' => 'pending']);

            return redirect()->route('factsContent_list')->with('error', 'One item must be Active');

        }

        factContent::where('id', $id)->update(['status' => 'pending']);

        return redirect()->route('factsContent_list');

    }

    public function factActive($id)
    {

        factContent::where('status', 'active')->update(['status' => 'pending']);
        factContent::where('id', $id)->update(['status' => 'active']);

        // $updatePending->update(['status'=> 'active']);

        return redirect()->route('factsContent_list');

    }
}
