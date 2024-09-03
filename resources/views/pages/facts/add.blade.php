@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Facts</li>
                <li class="breadcrumb-item active">Add Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add About Contents</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('saveFactContent') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                                            value="">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>


                                <h6 class="mt-5 mb-5 text-primary">Count Features</h6>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Count Title</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="count_title" name="count_title[]"
                                            value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Count Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="count_subTitle"
                                            name="count_subTitle[]" value="">
                                        
                                    </div>
                                </div>

                                

                                <div id="moreFeatures" class=" mt-5">

                                </div>

                                <div class="d-grid d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-outline-warning btn-sm mt-2 " data-toggle="modal" id="btn-CountFeatures"
                                    >Add More Features</button>
                                </div>

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
