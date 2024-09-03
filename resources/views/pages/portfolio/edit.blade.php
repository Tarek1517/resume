@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Portfolio</li>
                <li class="breadcrumb-item active">Edit Content</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-9">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Category</h5>

                            <!-- General Form Elements -->
                            <form action="{{ route('updatePortfolioFeatures',$editContent->id) }}" method="post" enctype="multipart/form-data">
                                
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="portfolio_name" name="portfolio_name"
                                            value="{{ $editContent->name }}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Portfolio img</label>
                                    <div class="col-sm-10">
                                        <img style="height: 30vh; border-radius: 10px;"
                                            src="{{ url('/storage/img/' . $editContent->image) }}" class="img-thumbnail"></br>
                                        <input class="mt-3 mb-3" type="file" id="portfolio_img" name="portfolio_img">
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Select Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-control js-example-basic-multiple" name="categories[]" multiple="multiple">
                                            @foreach ($cat as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
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
