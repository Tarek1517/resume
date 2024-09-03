@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Service</li>
                <li class="breadcrumb-item active">Content list</li>
            </ol>
            @include('alart.massages')
        </nav>


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">About section data lists</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable hero-list">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>View Features Data</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($serviceList as $key => $lists)
                                        <tr>
                                            <td class="align-middle">{{ $loop->index + 1 }}</td>
                                            <td class="align-middle">{{ $lists->title }}</td>
                                            <td class="align-middle">
                                                {{ \Illuminate\Support\str::limit(strip_tags($lists->sub_title), 40) }}
                                            </td>
                                            
                                            <td>
                                                <div>
                                                    <button type="button" class="btn btn-outline-success mt-2 servicebtn-modal"
                                                        data-toggle="modal" data-target=".serviceFeatursModal"
                                                        data-serviceFeatures="{{ $lists->serviceFeatures }}">Features</button>
                                                </div>
                                            </td>
                                            <td class="align-middle"> <span
                                                class="bg-{{ $lists->status === 'active' ? 'success' : 'warning' }} px-2 py-1 rounded text-white text-[12px]">
                                                {{ ucfirst($lists->status) }} </span></td>
                                            <td class="align-middle">
                                                <div class="raw">
                                                @if ($lists->status === 'active')
                                                    <a href="{{ route('ServicePendingStatus', $lists->id) }}"
                                                        title="Pending" class="btn btn-warning"><i
                                                            class="bi bi-arrow-down-circle"></i></a>
                                                @else
                                                    <a href="{{ route('serviceActiveStatus', $lists->id) }}" title="Active"
                                                        class="btn btn-success"><i
                                                            class="bi bi-check-circle"></i></a>
                                                @endif
                                            
                                                <a href="{{ route('editServiceList', $lists->id) }}" class="btn btn-primary"><i
                                                        class="fa-solid fa-pencil"></i></a>
                                                <a href="{{ route('deleteServiceList', $lists->id) }}"
                                                    onclick="return confirm('Are you sure you want to delete this item?')"
                                                    id="delete" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash-can"></i></a>
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


        <div class="modal fade serviceFeatursModal" tabindex="-1" role="modal" aria-labelledby="modalLMedium"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">

                <div class="modal-content p-5">

                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>#SL</th>
                                <th>Feature Icon</th>
                                <th>Feature Title</th>
                                <th>Feature Description</th>
                            </tr>
                        </thead>
                        <tbody class="show-modal-data">
                            
                        </tbody>
                    </table>

                </div>

            </div>
        </div>


    </div><!-- End Page Title -->
@endsection
