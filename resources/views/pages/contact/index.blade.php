@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Contact message</li>
                <li class="breadcrumb-item active">Message list</li>
            </ol>
            @include('alart.massages')
        </nav>


        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Message data lists</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable hero-list">
                                <thead>
                                    <tr>
                                        <th>#SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Send at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Contact as $key => $lists)
                                        <tr>
                                            <td class="align-middle">{{ $loop->index + 1 }}</td>
                                            <td class="align-middle">{{ $lists->name }}</td>
                                            <td class="align-middle">{{ $lists->email }}</td>
                                            <td class="align-middle">{{ $lists->subject }}</td>

                                            <td>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-outline-success mt-2 messagebtn-Modal"
                                                        data-toggle="modal" data-target=".messageModal"
                                                        data-message="{{ $lists->message }}">Message</button>
                                                </div>
                                            </td>

                                            <td class="align-middle">{{ $lists->created_at->format('d M, Y') }}</td>

                                            <td>
                                                <a href="{{ route('deleteMassageList', $lists->id) }}"
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


        <div class="modal fade messageModal" tabindex="-1" role="modal" aria-labelledby="modalLMedium"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content p-5">
                    <table id="data-table">
                        <thead>
                            <tr>
                                <th>Message</th>
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
