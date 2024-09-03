<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ContactMail;
use \App\Models\ContactInfo;
use \App\Models\MailContent;

class ContactController extends Controller
{

    public function index()
    {
        $data = [];
        $data['Contact'] = MailContent::get();
        return view("pages.contact.index", $data);
    }

    public function store(request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);

        $mailData = [];

        $mailData['name'] = $request->name;
        $mailData['email'] = $request->email;
        $mailData['subject'] = $request->subject;
        $mailData['message'] = $request->message;

        $insertData = MailContent::create($mailData);

        if ($insertData) {

            Mail::to('tarek.hasan041517@gmail.com')->send(new ContactMail($mailData));
            return redirect()->back()->with('success', 'Your message has been sent successfully!');

        } else {

            return redirect()->back()->with('error', 'Your message do not sent!');

        }

    }

    public function destroy($id)
    {

        MailContent::where('id', $id)->delete();
        
        return redirect()->route('EmailInfo_list')->with('success', 'Data delete Successfully');

    }

    public function create()
    {
        return view("pages.contact.add");
    }

    public function storeContent(Request $request)
    {
        request()->validate([

            'address' => 'required | string',
            'email' => 'required | string',
            'phone' => 'required',
            'facebook_link' => 'required',

        ]);

        $data = [];

        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['facebook_link'] = $request->facebook_link;
        $data['twitter_link'] = $request->twitter_link;
        $data['insta_link'] = $request->insta_link;
        $data['linkedin_link'] = $request->linkedin_link;

        $insertData = ContactInfo::create($data);

        if ($insertData) {

            return redirect()->route('add_ContactContent')->with('success', 'Contact Page Data has been updated successfully');

        } else {

            return redirect()->route('add_ContactContent')->with('error', 'Contact page Data is not updated');

        }
    }

    public function indexContactList()
    {
        $data = [];
        $data['ContactInfoList'] = ContactInfo::get();
        return view("pages.contact.indexinfo", $data);
    }

    public function pendingCon($id)
    {

        $active = ContactInfo::find($id)->where('status', 'active')->first();

        if ($active) {

            ContactInfo::where('status', 'active')->update(['status' => 'pending']);

            return redirect()->route('ContactContent_list')->with('error', 'One item must be Active');

        }

        ContactInfo::where('id', $id)->update(['status' => 'pending']);

        return redirect()->route('ContactContent_list');

    }

    public function activeCon($id)
    {

        ContactInfo::where('status', 'active')->update(['status' => 'pending']);
        ContactInfo::where('id', $id)->update(['status' => 'active']);

        // $updatePending->update(['status'=> 'active']);

        return redirect()->route('ContactContent_list');

    }

    public function destroyContactInfo($id)
    {

        ContactInfo::where('id', $id)->delete();
        
        return redirect()->route('ContactContent_list')->with('success', 'Data delete Successfully');
        

    }

    public function edit(string $id)
    {
        $data = [];

        $data['editInfo'] = ContactInfo::find($id);

        return view('pages.contact.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        request()->validate([

            'address' => 'required | string',
            'email' => 'required | string',
            'phone' => 'required',
            'facebook_link' => 'required',

        ]);

        $data = [];

        $data['address'] = $request->address;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['facebook_link'] = $request->facebook_link;
        $data['twitter_link'] = $request->twitter_link;
        $data['insta_link'] = $request->insta_link;
        $data['linkedin_link'] = $request->linkedin_link;

        $insertData = ContactInfo::where('id',$id)->update($data);

        if ($insertData) {

            return redirect()->route('ContactContent_list')->with('success', 'Contact Page Data has been updated successfully');

        } else {

            return redirect()->route('add_ContactContent')->with('error', 'Contact page Data is not updated');

        }
    }


    


    

}
