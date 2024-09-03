@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Home</li>
                <li class="breadcrumb-item active">Edit Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Hero Contents</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('updateList', $editHero->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $editHero->title }}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="sub_title" name="sub_title"
                                            value="{{ $editHero->sub_title }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">BG img</label>
                                    <div class="col-sm-10">
                                        <img style="height: 30vh; border-radius: 10px;"
                                            src="{{ url('/storage/img/' . $editHero->bg_img) }}" class="img-thumbnail">

                                        <input class="mt-3 mb-3" type="file" id="bg_img" name="bg_img">
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Upl Resume</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" id="resume" name="resume"
                                            value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios1"
                                                value="Pending" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                                Pending
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios2"
                                                value="Active">
                                            <label class="form-check-label" for="gridRadios2">
                                                Active
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
