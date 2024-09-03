@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Team</li>
                <li class="breadcrumb-item active">Add Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Team Contents</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('addTeamContent') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="designation" name="designation"
                                            value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="person_img" name="person_img">
                                    </div>

                                </div>

                                <h6 class="mt-5 mb-5 text-primary">Links</h6>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">FaceBook</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="facebook_link" name="facebook_link">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Twiter</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="twitter_link" name="twitter_link">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Insta</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="insta_link" name="insta_link">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="linkedin_link" name="linkedin_link">
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
