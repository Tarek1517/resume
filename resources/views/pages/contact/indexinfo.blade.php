@extends('layouts.layout')
@section('content')

    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Contact</li>
                <li class="breadcrumb-item active">Content Content List</li>
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
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Links</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (count($ContactInfoList) > 0)
                                        @foreach ($ContactInfoList as $lists)
                                            <tr>
                                                <td class="align-middle">{{ $loop->index+1 }}</td>
                                                <td class="align-middle">{{ $lists->address }}</td>
                                                <td class="align-middle">{{$lists->email}}</td>
                                                <td class="align-middle">{{$lists->phone}}</td>

                                                <td class="align-middle">
                                                    @if($lists->facebook_link)
                                                    <a href="{{ $lists->facebook_link }}"
                                                        class="mr-1"><i class="bi bi-facebook"></i></a>
                                                    @endif
                                                    @if($lists->twitter_link)
                                                    <a href="{{ $lists->twitter_link }}"
                                                        class="mr-1"><i class="bi bi-twitter"></i></a>
                                                    @endif
                                                    @if($lists->insta_link)
                                                    <a href="{{ $lists->insta_link}}"
                                                        class="mr-1"><i class="bi bi-instagram"></i></a>
                                                    @endif
                                                    @if($lists->linkedin_link)
                                                    <a href="{{$lists->linkedin_link }}"
                                                        class=""><i class="bi bi-linkedin"></i></a>
                                                    @endif
                                                </td>
                                                
                                                <td class="align-middle"> <span
                                                        class="bg-{{ $lists->status === 'active' ? 'success' : 'warning' }} px-2 py-1 rounded text-white text-[12px]">
                                                        {{ ucfirst($lists->status) }} </span></td>
                                                <td class="align-middle">
                                                    <div class="raw">
                                                        @if ($lists->status === 'active')
                                                            <a href="{{ route('pendinginfo', $lists->id) }}"
                                                                title="Pending" class="btn btn-warning"><i
                                                                    class="bi bi-arrow-down-circle"></i></a>
                                                        @else
                                                            <a href="{{ route('activeinfo', $lists->id) }}" title="Active"
                                                                class="btn btn-success"><i
                                                                    class="bi bi-check-circle"></i></a>
                                                        @endif

                                                        <a href="{{ route('editContactListinfo', $lists->id) }}"
                                                            class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                                        <a href="{{ route('deleteContactInfo', $lists->id) }}"
                                                            onclick="return confirm('Are you sure you want to delete this item?')"
                                                            id="delete" class="btn btn-danger"><i
                                                                class="fa-solid fa-trash-can"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

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
