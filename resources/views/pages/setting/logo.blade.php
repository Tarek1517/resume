@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Logo</li>
                <li class="breadcrumb-item active">Change Logo</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-6">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Team Contents</h5>
                            @foreach ($LogoAdd as $item)
                                
                            <!-- General Form Elements -->
                            <form action="{{ route('add_logo') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Logo</label>
                                    <div class="col-sm-10">

                                        <img style="height: 10vh; border-radius: 10px;"
                                            src="{{ url('/storage/img/' . $item->logo) }}" class="img-thumbnail"></br>
                                            
                                        <input class="mt-3" type="file" id="logo" name="logo">
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
