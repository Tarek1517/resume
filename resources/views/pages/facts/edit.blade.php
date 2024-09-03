@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Fact</li>
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
                            <form action="{{route('updateFactsData',$editFacts->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                        value="{{$editFacts->title}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                                            value="{{$editFacts->sub_title}}">
                                        
                                    </div>
                                </div>

                                @foreach ($editFacts->factFeatures as $FeaturesEdit)
                                    
                                <div value="{{$FeaturesEdit->fact_id}}" {{ $FeaturesEdit->fact_id == $editFacts->id ? 'selected' : '' }}>

                                

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Count Title</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="features_id[]" value="{{ $FeaturesEdit->id }}">
                                        <input type="number" class="form-control" id="count_title"
                                            name="count_title[]" value="{{$FeaturesEdit->count_title}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Count Subtitle</label>
                                    <div class="col-sm-10">

                                        <input type="text" class="form-control" id="count_subTitle"
                                            name="count_subTitle[]" value="{{$FeaturesEdit->count_subTitle}}">
                                       
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
