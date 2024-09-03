<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/vendor2/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor2/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor2/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor2/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor2/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor2/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/vendor2/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css') }}"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/dash/Style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">


        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('admin_dashboard') }}" class="logo d-flex align-items-center">
                <img src="assets/img/logo21.png" alt="">
                <span class="d-none d-lg-block ">Admin Dashboard</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown pe-3">
                    
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        

                        <li>
                            <div class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-person"></i>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            </div>
                        </li>
                        
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <div class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"></i>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin_dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="fa-solid fa-house-flag"></i><span>Home</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav"
                    class="nav-content collapse {{ Route::currentRouteName() == 'add_heroContent' || Route::currentRouteName() == 'heroContent_List' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_heroContent') }}"
                            class="{{ Route::currentRouteName() == 'add_heroContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('heroContent_List') }}"
                            class="{{ Route::currentRouteName() == 'heroContent_List' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents lists</span>
                        </a>
                    </li>

                </ul>
            </li>
            <!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-regular fa-address-card"></i><span>About</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav"
                    class="nav-content collapse {{ Route::currentRouteName() == 'add_aboutContent' || Route::currentRouteName() == 'aboutContent_list' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_aboutContent') }}"
                            class="{{ Route::currentRouteName() == 'add_aboutContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('aboutContent_list') }}"
                            class="{{ Route::currentRouteName() == 'aboutContent_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents lists</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Facts-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-fire"></i><span>Facts</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Facts-nav"
                    class="nav-content collapse {{ Route::currentRouteName() == 'add_factsContent' || Route::currentRouteName() == 'factsContent_list' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_factsContent') }}"
                            class="{{ Route::currentRouteName() == 'add_factsContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('factsContent_list') }}"
                            class="{{ Route::currentRouteName() == 'factsContent_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents lists</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Facts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#service-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="fa-brands fa-servicestack"></i><span>Services</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="service-nav"
                    class="nav-content collapse {{ Route::currentRouteName() == 'add_serviceContent' || Route::currentRouteName() == 'serviceContent_list' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_serviceContent') }}"
                            class="{{ Route::currentRouteName() == 'add_serviceContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('serviceContent_list') }}"
                            class="{{ Route::currentRouteName() == 'serviceContent_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents lists</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Facts Nav -->


            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Action-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-cannabis"></i><span>Call to Action</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Action-nav"
                    class="nav-content collapse {{ Route::currentRouteName() == 'add_callActionContent' || Route::currentRouteName() == 'callActionContent_list' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_callActionContent') }}"
                            class="{{ Route::currentRouteName() == 'add_callActionContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('callActionContent_list') }}"
                            class="{{ Route::currentRouteName() == 'callActionContent_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents lists</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Facts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#portfolio-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="fa-solid fa-user-tie"></i><span>Portfolio</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="portfolio-nav"
                    class="nav-content collapse {{ in_array(Route::currentRouteName(), ['add_portfolioContent', 'portfolioContent_list', 'add_categories', 'category_list']) ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_categories') }}"
                            class="{{ Route::currentRouteName() == 'add_categories' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Categories</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('category_list') }}"
                            class="{{ Route::currentRouteName() == 'category_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Category List</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('add_portfolioContent') }}"
                            class="{{ Route::currentRouteName() == 'add_portfolioContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('portfolioContent_list') }}"
                            class="{{ Route::currentRouteName() == 'portfolioContent_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents lists</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Facts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Team-nav" data-bs-toggle="collapse" href="#">
                    <i class="fa-solid fa-people-group"></i><span>Team</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Team-nav"
                    class="nav-content collapse {{ Route::currentRouteName() == 'add_teamContent' || Route::currentRouteName() == 'teamContent_list' ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_teamContent') }}"
                            class="{{ Route::currentRouteName() == 'add_teamContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('teamContent_list') }}"
                            class="{{ Route::currentRouteName() == 'teamContent_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents lists</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Facts Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#Contact-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="fa-solid fa-file-contract"></i><span>Contact</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="Contact-nav"
                    class="nav-content collapse {{ in_array(Route::currentRouteName(), ['add_ContactContent', 'ContactContent_list', 'EmailInfo_list']) ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_ContactContent') }}"
                            class="{{ Route::currentRouteName() == 'add_ContactContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Add Contents</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ContactContent_list') }}"
                            class="{{ Route::currentRouteName() == 'ContactContent_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Contents List</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('EmailInfo_list') }}"
                            class="{{ Route::currentRouteName() == 'EmailInfo_list' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Email info</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Facts Nav -->

            
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse"
                    href="#">
                    <i class="fa-solid fa-gears"></i><span>Settings</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="setting-nav"
                    class="nav-content collapse {{ in_array(Route::currentRouteName(), ['add_SettingContent', 'Logo_Change', 'footer_Section']) ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('add_SettingContent') }}"
                            class="{{ Route::currentRouteName() == 'add_SettingContent' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Section Title</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('Logo_Change') }}"
                            class="{{ Route::currentRouteName() == 'Logo_Change' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Change Logo</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('footer_Section') }}"
                            class="{{ Route::currentRouteName() == 'footer_Section' ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Footer Section</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Facts Nav -->


        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="content-wrapper">
            <div class="row">

                @yield('content')

            </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets/vendor2/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor2/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor2/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('/assets/vendor2/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor2/quill/quill.js') }}"></script>
    <script src="{{ asset('/assets/vendor2/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/assets/vendor2/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor2/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/assets/js/dash/Script.js') }}"></script>
    <script src="{{ asset('/assets/js/layout.js') }}"></script>

</body>

</html>
