@extends('layouts.layout')
@section('content')

    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Portfolio</li>
                <li class="breadcrumb-item active">Content list</li>
            </ol>
            @include('alart.massages')
        </nav>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hero section data lists</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable hero-list">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($portfolios as $lists)
                                            <tr>
                                                <td class="align-middle">{{ $loop->index+1 }}</td>
                                                <td class="align-middle">{{ $lists->name }}</td>
                                                <td class="align-middle">
                                                    
                                                    @foreach($lists->categories as $cat)
                                                        {{$cat->name . ', '}}
                                                    @endforeach
                                                </td>
                                                <td class="align-middle hero-thumbnail">
                                                    <img src="{{ url('/storage/img/' . $lists->image) }}">
                                                </td>

                                                <td class="align-middle">
                                                    <div class="raw">
                                                        <a href="{{ route('editPortfolioList', $lists->id) }}"
                                                            class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                                        <a href="{{ route('deletePortfolioList', $lists->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete this item?')"
                                                            id="delete" class="btn btn-danger"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>



    </div><!-- End Page Title -->



@endsection
