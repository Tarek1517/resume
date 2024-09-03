@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Portfolio</li>
                <li class="breadcrumb-item active">Add Category</li>
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
                            <form action="{{ route('updateCategory',$cat->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{$cat->name}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Slug</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="Slug" name="Slug"
                                            value="{{$cat->Slug}}">
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
