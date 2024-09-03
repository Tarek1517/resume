<?php

namespace App\Http\Controllers;
use \App\Models\HeroHome;
use Illuminate\Http\Request;

class adminController extends Controller

{
    public function mainHome(){

        $heroHome = HeroHome::first();
        return view('pages.home', compact('heroHome'));

    }

    public function admin_dashboard(){

        return view('pages.maindashboard');

    }
}
