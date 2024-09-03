@extends('layouts.layout')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="{{ url('admin_dashboard') }}"><span
                            style="color:#4154f1;">Dashboard</span></a></li>
                <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_heroContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('heroContent_List') }}">Content List</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Home <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-house-flag"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Home</h6>
                                        <span class="text-primary small pt-1 fw-bold">2</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Home Card -->

                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_aboutContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('aboutContent_list') }}">Content List</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">About <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="fa-regular fa-address-card"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>About Us</h6>
                                        <span class="text-success small pt-1 fw-bold">2</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End About Card -->

                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_factsContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('factsContent_list') }}">Content List</a></li>
                                    
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Facts <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-fire"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Facts</h6>
                                        <span class="text-danger small pt-1 fw-bold">2</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Fact Card -->

                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_serviceContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('serviceContent_list') }}">Content List</a></li>
                                    
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Service <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="background-color: rgba(127, 255, 212, 0.355)" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style = "color:rgba(12, 113, 107, 0.874);" class="fa-brands fa-servicestack"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Services</h6>
                                        <span style = "color:rgba(12, 113, 107, 0.874);" class="small pt-1 fw-bold">2</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Services Card -->

                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_callActionContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('callActionContent_list') }}">Content List</a></li>
                                    
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Call to Action <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="background-color: rgba(171, 84, 233, 0.258)" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style = "color:rgba(171, 84, 233, 0.936);" class="fa-solid fa-cannabis"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Call to Action</h6>
                                        <span style = "color:rgba(171, 84, 233, 0.936);" class="small pt-1 fw-bold">2</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Call to Action Card -->

                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_categories') }}">Add Category</a></li>
                                    <li><a class="dropdown-item" href="{{ route('category_list') }}">Category List</a></li>
                                    <li><a class="dropdown-item" href="{{ route('add_portfolioContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('portfolioContent_list') }}">Content List</a></li>
                                    
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Portfolio <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="background-color: rgba(163, 255, 127, 0.263);" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style = "color:rgb(14, 159, 64);" class="fa-solid fa-user-tie"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Portfolio</h6>
                                        <span style = "color:rgb(14, 159, 64);" class="small pt-1 fw-bold">4</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Portfolio Card -->

                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_teamContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('teamContent_list') }}">Content List</a></li>
                                    
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Team <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="background-color: rgba(242, 219, 12, 0.355);" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style = "color:rgb(70, 77, 5);" class="fa-solid fa-people-group"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Team</h6>
                                        <span style = "color:rgb(70, 77, 5);" class="small pt-1 fw-bold">2</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Team Card -->

                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_ContactContent') }}">Add Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('ContactContent_list') }}">Content List</a></li>
                                    <li><a class="dropdown-item" href="{{ route('EmailInfo_list') }}">Email List</a></li>
                                    
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Contact <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="background-color: rgba(236, 32, 32, 0.311);" class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style = "color:rgb(144, 8, 8);" class="fa-solid fa-file-contract"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Contact</h6>
                                        <span style = "color:rgb(144, 8, 8);" class="small pt-1 fw-bold">3</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Contact Card -->

                    <div class="col-xxl-4 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="{{ route('add_SettingContent') }}">Add Setting Content</a></li>
                                    <li><a class="dropdown-item" href="{{ route('Logo_Change') }}">Logo Change</a></li>
                                    <li><a class="dropdown-item" href="{{ route('footer_Section') }}">Footer Section</a></li>
                                    
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Settings <span>| Section</span></h5>

                                <div class="d-flex align-items-center">
                                    <div style="background-color: #d6eaf8 " class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i style = "color:#2874a6;" class="fa-solid fa-gears"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>Settings</h6>
                                        <span style = "color:#2874a6;" class="small pt-1 fw-bold">3</span> <span
                                            class="text-muted small pt-2 ps-1">Sections</span>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Setting Card -->


                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
