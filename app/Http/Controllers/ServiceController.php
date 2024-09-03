<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\serviceContent;
use \App\Models\serviceFeatures;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceList = serviceContent::with('serviceFeatures')->get();

        return view('pages.services.index', compact('serviceList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.services.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([

            'title' => 'required | string',
            'sub_title' => 'required | string',
            'features_title' => 'required|array',
            'features_description' => 'required|array',
            'features_icon' => 'required|array',

        ]);

        $features_title = $request->features_title;
        $features_description = $request->features_description;
        $features_icon = $request->features_icon;

        $serviceData = [];

        $serviceData['title'] = $request->title;
        $serviceData['sub_title'] = $request->sub_title;

        $service = serviceContent::create($serviceData);

        $featuresDataFinal = [];

        if (isset($service->id)) {
            foreach ($features_title as $key => $title) {
                $featuresDataFinal[] = [
                    'service_id' => $service->id,
                    'features_title' => $title,
                    'features_description' => $features_description[$key],
                    'features_icon' => $features_icon[$key],
                ];
            }
        }

        foreach ($featuresDataFinal as $features) {
            $features = serviceFeatures::create($features);
        }

        if ($service) {

            return redirect()->route('add_serviceContent')->with('success', 'Service page Data has been save successfully');

        } else {

            return redirect()->route('add_serviceContent')->with('error', 'Service page Data is not save');

        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [];

        $data['editService'] =  serviceContent::with('serviceFeatures')->find($id);

        return view('pages.services.edit', $data);
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

        $features_title = $request->features_title;
        $features_description = $request->features_description;
        $features_icon = $request->features_icon;
        $features_id = $request->features_id;

        $serviceData = [];

        $serviceData['title'] = $request->title;
        $serviceData['sub_title'] = $request->sub_title;

        

        $serviceID = serviceContent::where('id', $id)->update($serviceData);

        $featuresDataFinal = [];

        if ($serviceID) {
            foreach ($features_title as $key => $title) {
                $featuresDataFinal[] = [
                    'service_id' => $id,
                    'features_title' => $title,
                    'features_description' => $features_description[$key],
                    'features_icon' => $features_icon[$key],

                ];
            }
        }

        // dd($featuresDataFinal);

        foreach ($featuresDataFinal as $key => $features) {
            $featureId = $features_id[$key];
            serviceFeatures::where(['id' => $featureId, 'service_id' => $id])->update($features);

        }

        if ($serviceID) {

            return redirect()->route('serviceContent_list')->with('success', 'About us  page Data has been updated successfully');

        } else {

            return redirect()->route('serviceContent_list')->with('error', 'About us page Data is not updated');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = serviceContent::find($id);
        $delete->where('id', $id)->delete();

        $delete->serviceFeatures()->delete();

        return redirect()->route('serviceContent_list')->with('alert', 'Data delete Successfully');

    }
    public function servicePending($id)
    {

        $active = serviceContent::find($id)->where('status', 'active')->first();

        if ($active) {

            serviceContent::where('status', 'active')->update(['status' => 'pending']);

            return redirect()->route('serviceContent_list')->with('error', 'One item must be Active');

        }

        serviceContent::where('id', $id)->update(['status' => 'pending']);

        return redirect()->route('serviceContent_list');

    }

    public function serviceActive($id)
    {

        serviceContent::where('status', 'active')->update(['status' => 'pending']);
        serviceContent::where('id', $id)->update(['status' => 'active']);

        // $updatePending->update(['status'=> 'active']);

        return redirect()->route('serviceContent_list');

    }
}
