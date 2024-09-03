@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Footer</li>
                <li class="breadcrumb-item active">Add Footer Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Footer Contents</h5>

                            @foreach ($LogoAdd as $item)

                            <!-- General Form Elements -->
                            <form action="{{ route('addFooterContent') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Website Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="site_name" name="site_name"
                                            value="{{$item->site_name}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Design By Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="design_name" name="design_name"
                                            value="{{$item->design_name}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Design By Link</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" id="design_link" name="design_link" value="{{$item->design_link}}">
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
