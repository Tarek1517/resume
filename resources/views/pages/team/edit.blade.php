@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Team</li>
                <li class="breadcrumb-item active">Edit Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Team Contents</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('updateTeamContent', $editTeam->id) }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{$editTeam->name}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="designation" name="designation"
                                            value="{{$editTeam->designation}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">

                                        <img style="height: 30vh; border-radius: 10px;"
                                            src="{{ url('/storage/img/' . $editTeam->person_img) }}" class="img-thumbnail"></br>

                                        <input class="mt-3" type="file" id="person_img" name="person_img">
                                    </div>

                                </div>

                                <h6 class="mt-5 mb-5 text-primary">Links</h6>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">FaceBook</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="facebook_link" name="facebook_link" value="{{$editTeam->facebook_link}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Twiter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="twitter_link" name="twitter_link" value="{{$editTeam->twitter_link}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Insta</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="insta_link" name="insta_link" value="{{$editTeam->insta_link}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="linkedin_link" name="linkedin_link" value="{{$editTeam->linkedin_link}}">
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
