@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Contact</li>
                <li class="breadcrumb-item active">Edit Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Contents</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('updateContactContent', $editInfo->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{$editInfo->address}}">
                                        
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{$editInfo->email}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            value="{{$editInfo->phone}}">
                                    </div>
                                </div>

                                <h6 class="mt-5 mb-5 text-primary">Links</h6>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">FaceBook</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="facebook_link" name="facebook_link"  value="{{$editInfo->facebook_link}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Twiter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="twitter_link" name="twitter_link" value="{{$editInfo->twitter_link}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Insta</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="insta_link" name="insta_link" value="{{$editInfo->insta_link}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="linkedin_link" name="linkedin_link" value="{{$editInfo->linkedin_link}}">
                                    </div>
                                </div>

                                <div class="row mb-3 mt-5">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form><!-- End General Form Elements -->

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div><!-- End Page Title -->
@endsection
