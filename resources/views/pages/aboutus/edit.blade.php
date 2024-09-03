@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">About</li>
                <li class="breadcrumb-item active">Edit Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-7">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit About Contents</h5>

                            <!-- General Form Elements -->
                            <form action="{{route('updateAboutData',$editAbout->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                        value="{{$editAbout->title}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" style="height: 100px" id="description" name="description" >{{$editAbout->description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <img style="height: 30vh; border-radius: 10px; margin-bottom:20px;"
                                            src="{{ url('/storage/img/' . $editAbout->image_path) }}" class="img-thumbnail">
                                        <input class="" type="file" id="image_path" name="image_path">
                                    </div>

                                </div>

                                @foreach ($editAbout->AboutFeatures as $FeaturesEdit)
                                    
                                <div value="{{$FeaturesEdit->about_id}}" {{ $FeaturesEdit->about_id == $editAbout->id ? 'selected' : '' }}>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Icon </label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="features_id[]" value="{{ $FeaturesEdit->id }}">
                                        <input type="text" class="form-control" id="features_icon" name="features_icon[]"
                                            value="{{$FeaturesEdit->features_icon}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Feature Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="features_title"
                                            name="features_title[]" value="{{$FeaturesEdit->features_title}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Feature Desc</label>
                                    <div class="col-sm-10">
                                        {{-- <input type="textarea" class="form-control" id="description" name="description" value=""> --}}
                                        <textarea class="form-control" style="height: 100px" id="features_description" name="features_description[]"
                                            value="">{{$FeaturesEdit->features_description}}</textarea>
                                    </div>
                                </div>

                                </div>
                                @endforeach

                                <div class="row mb-3 mt-5">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary pr-5 pl-5">Submit</button>
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
