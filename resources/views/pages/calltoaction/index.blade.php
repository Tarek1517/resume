@extends('layouts.layout')
@section('content')

    <div class="pagetitle">
        <h1 class="mb-1">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Call to Action</li>
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
                                        <th>Description</th>
                                        <th>BG Img</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if (count($actionList) > 0)
                                        @foreach ($actionList as $lists)
                                            <tr>
                                                <td class="align-middle">{{ $loop->index+1 }}</td>
                                                <td class="align-middle">{{ $lists->title }}</td>
                                                <td class="align-middle">
                                                    {{ \Illuminate\Support\str::limit(strip_tags($lists->action_description), 40) }}
                                                </td>
                                                <td class="align-middle hero-thumbnail">
                                                    <img src="{{ url('/storage/img/' . $lists->bg_img) }}">
                                                </td>
                                                <td class="align-middle"> <span
                                                        class="bg-{{ $lists->status === 'active' ? 'success' : 'warning' }} px-2 py-1 rounded text-white text-[12px]">
                                                        {{ ucfirst($lists->status) }} </span></td>
                                                <td class="align-middle">
                                                    <div class="raw">
                                                        @if ($lists->status === 'active')
                                                            <a href="{{ route('actionPending', $lists->id) }}"
                                                                title="Pending" class="btn btn-warning"><i
                                                                    class="bi bi-arrow-down-circle"></i></a>
                                                        @else
                                                            <a href="{{ route('actionActive', $lists->id) }}" title="Active"
                                                                class="btn btn-success"><i
                                                                    class="bi bi-check-circle"></i></a>
                                                        @endif

                                                        <a href="{{ route('editActionList', $lists->id) }}"
                                                            class="btn btn-primary"><i class="fa-solid fa-pencil"></i></a>
                                                        <a href="{{ route('deleteActionList', $lists->id) }}"
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
