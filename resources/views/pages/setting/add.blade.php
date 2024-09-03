@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Setting</li>
                <li class="breadcrumb-item active">Add Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Setting Contents</h5>

                            @foreach ($settings as $item)

                            <!-- General Form Elements -->
                            <form action="{{ route('storeSettingContent') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Portfolio Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Portfolio_title" name="Portfolio_title"
                                            value="{{$item->Portfolio_title}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Portfolio Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Portfolio_SubTitle" name="Portfolio_SubTitle"
                                            value="{{$item->Portfolio_SubTitle}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Team Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="team_title" name="team_title"
                                            value="{{$item->team_title}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Team Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="team_SubTitle" name="team_SubTitle"
                                            value="{{$item->team_SubTitle}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Contact Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="contact_title" name="contact_title"
                                            value="{{$item->contact_title}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Contact Sub Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="contact_SubTitle" name="contact_SubTitle"
                                            value="{{$item->contact_SubTitle}}">
                                    </div>
                                </div>

                                <div class="row mb-3 mt-5">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                               

                            </form><!-- End General Form Elements -->

                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div><!-- End Page Title -->
@endsection
