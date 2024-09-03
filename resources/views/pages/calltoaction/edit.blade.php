@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Call to Action</li>
                <li class="breadcrumb-item active">Add Contents</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-7">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Hero Contents</h5>
                            

                            <!-- General Form Elements -->
                            <form action="{{ route('updateActionContent',$editAction->id )}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{$editAction->title}}">
                                        {{-- <span style="color:red">{{ $errors->first('title') }}</span> --}}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        {{-- <input type="textarea" class="form-control" id="description" name="description" value=""> --}}
                                        <textarea class="form-control" style="height: 100px" id="action_description" name="action_description"
                                            value="">{{$editAction->action_description}}</textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">BG img</label>
                                    <div class="col-sm-10">
                                        <img style="height: 30vh; border-radius: 10px;"
                                            src="{{ url('/storage/img/' . $editAction->bg_img) }}" class="img-thumbnail">

                                        <input class="mt-3 mb-3" type="file" id="bg_img" name="bg_img">
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
