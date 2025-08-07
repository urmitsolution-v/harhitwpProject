<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') {{ env('APP_NAME') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ url('images') }}/logo.png">
    <link href="{{ url('admin') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin') }}/assets/libs/dropzone/dropzone.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <!-- App js -->

    @yield('header')

</head>


<body data-sidebar="dark">


    <style>
        .logo-lg img {
            width: 100%;
            height: 45px;
            object-fit: contain;

        }

        .navbar-brand-box{
                display: flex;
    align-items: center;
    justify-content: center;
        }

    </style>

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box bg-white">
                        <a href="/admin/dashboard" class="logo logo-dark">
                            <span class="logo-sm">
                                {{-- <h6 class="text-white">Admin Dashboard</h6> --}}
                                <img src="{{ url('images') }}/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                {{-- <h6 class="text-white">Admin Dashboard</h6> --}}

                                <img src="{{ url('images') }}/logo.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="/admin/dashboard" class="logo logo-light">
                            <span class="logo-sm">
                                {{-- <h6 class="text-white">Admin Dashboard</h6> --}}

                                <img src="{{ url('images') }}/logo.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                {{-- <h6 class="text-white">Admin Dashboard</h6> --}}

                                <img src="{{ url('images') }}/logo.png" alt="" height="19">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <!-- App Search-->
                    {{-- <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bx bx-search-alt"></span>
                        </div>
                    </form> --}}

                </div>

                <div class="d-flex">

                    {{-- <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-customize"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <div class="px-lg-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#">
                                            <img src="{{ url('admin') }}/assets/images/brands/github.png" alt="Github">
                    <span>GitHub</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="{{ url('admin') }}/assets/images/brands/bitbucket.png" alt="bitbucket">
                        <span>Bitbucket</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="{{ url('admin') }}/assets/images/brands/dribbble.png" alt="dribbble">
                        <span>Dribbble</span>
                    </a>
                </div>
            </div>

            <div class="row g-0">
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="{{ url('admin') }}/assets/images/brands/dropbox.png" alt="dropbox">
                        <span>Dropbox</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="{{ url('admin') }}/assets/images/brands/mail_chimp.png" alt="mail_chimp">
                        <span>Mail Chimp</span>
                    </a>
                </div>
                <div class="col">
                    <a class="dropdown-icon-item" href="#">
                        <img src="{{ url('admin') }}/assets/images/brands/slack.png" alt="slack">
                        <span>Slack</span>
                    </a>
                </div>
            </div>
    </div>
    </div>
    </div> --}}

    <div class="dropdown d-none d-lg-inline-block ms-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
            <i class="bx bx-fullscreen"></i>
        </button>
    </div>

    {{-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="bx bx-bell bx-tada"></i>
                            <span class="badge bg-danger rounded-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0" key="t-notifications"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small" key="t-view-all"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="javascript: void(0);" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3">
                                            <span class="avatar-title bg-primary rounded-circle font-size-16">
                                                <i class="bx bx-cart"></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1" key="t-your-order">Your order is placed</h6>
                                            <div class="font-size-12 text-muted">
                                                <p class="mb-1" key="t-grammer">If several languages coalesce the
                                                    grammar</p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span
                                                        key="t-min-ago">3 min ago</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="text-reset notification-item">
                                    <div class="d-flex">
                                        <img src="{{ url('admin') }}/assets/images/users/avatar-3.jpg"
    class="me-3 rounded-circle avatar-xs" alt="user-pic">
    <div class="flex-grow-1">
        <h6 class="mb-1">James Lemire</h6>
        <div class="font-size-12 text-muted">
            <p class="mb-1" key="t-simplified">It will seem like simplified
                English.</p>
            <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
        </div>
    </div>
    </div>
    </a>
    <a href="javascript: void(0);" class="text-reset notification-item">
        <div class="d-flex">
            <div class="avatar-xs me-3">
                <span class="avatar-title bg-success rounded-circle font-size-16">
                    <i class="bx bx-badge-check"></i>
                </span>
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-1" key="t-shipped">Your item is shipped</h6>
                <div class="font-size-12 text-muted">
                    <p class="mb-1" key="t-grammer">If several languages coalesce the
                        grammar</p>
                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-min-ago">3 min ago</span></p>
                </div>
            </div>
        </div>
    </a>

    <a href="javascript: void(0);" class="text-reset notification-item">
        <div class="d-flex">
            <img src="{{ url('admin') }}/assets/images/users/avatar-4.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
            <div class="flex-grow-1">
                <h6 class="mb-1">Salena Layfield</h6>
                <div class="font-size-12 text-muted">
                    <p class="mb-1" key="t-occidental">As a skeptical Cambridge friend
                        of mine occidental.</p>
                    <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span key="t-hours-ago">1 hours ago</span></p>
                </div>
            </div>
        </div>
    </a>
    </div>
    <div class="p-2 border-top d-grid">
        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
            <i class="mdi mdi-arrow-right-circle me-1"></i> <span key="t-view-more">View
                More..</span>
        </a>
    </div>
    </div>
    </div> --}}

    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="rounded-circle header-profile-user" src="{{ url('') }}/uploads/{{ Auth::user()->image }}" alt="Header Avatar">
            <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ Auth::user()->name }}</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <a class="dropdown-item" href="/admin/profile"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item text-danger" href="/logout"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
        </div>
    </div>

    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
            <i class="bx bx-cog bx-spin"></i>
        </button>
    </div>

    </div>
    </div>
    </header>

    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li class="menu-title" key="t-menu">Menu</li>

                    <li>
                        <a href="/admin/dashboard" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">Dashboard</span>
                        </a>

                    </li>


                    <li>
                        <a href="javascript: void(0);" class="waves-effect has-arrow">
                            <i class='bx bx-detail'></i>
                            <span key="t-jobs">Menu Pages</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/admin/menu-categories" key="t-job-list">Main Menu</a></li>
                            <li><a href="/admin/menu-subcategories" key="t-job-list">Submenu</a></li>

                        </ul>
                    </li>


{{--                   
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-invoices">Pages</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                           
                            <li><a href="/admin/awards" key="t-invoice-list">Awards</a></li>
                            <li><a href="/admin/homeabout" key="t-invoice-list">About Us Home</a></li>
                            <li><a href="/admin/herosection" key="t-invoice-list">Hero Banner</a></li>
                            <li><a href="/admin/whychooseus" key="t-invoice-list">Why Aone</a></li>
                            <li><a href="/admin/counters" key="t-invoice-list">Counters</a></li>
                            <li><a href="/admin/working-areas" key="t-invoice-list">Working Areas</a></li>
                            <li><a href="/admin/working-process" key="t-invoice-list">Working Process</a></li>
                            <li><a href="/admin/schedule-an-intro" key="t-invoice-list">Schedule an Intro</a></li>
                            <li><a href="/admin/testimonials" key="t-invoice-list">Testimonials</a></li>
                            <li><a href="/admin/terms-condition" key="t-invoice-list">Terms & Condition</a></li>
                            <li><a href="/admin/privacy-policy" key="t-invoice-list">Privacy Policy</a></li>
                            <li><a href="/admin/faqs" key="t-invoice-detail">Faq</a></li>
                            <li><a href="/admin/home-image" key="t-invoice-detail">Home Image</a></li>
                            <li><a href="/admin/have-a-look" key="t-invoice-detail">Have A Look</a></li>
                            <!--<li><a href="/admin/news-articles" key="t-invoice-detail">News & Articles</a></li>-->
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span key="t-projects">Service</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <!--<li><a href="/admin/categories?type=service" key="t-p-grid">Categories</a></li>-->
                            <li><a href="/admin/add-services" key="t-p-list">Create Service</a></li>
                            <li><a href="/admin/services-list" key="t-p-list">Service List</a></li>
                        </ul>
                    </li>
                   
                   
                    <li>
                        <a href="/admin/about-us" class="waves-effect">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span key="t-projects">About Us</span>
                        </a>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span key="t-projects">Industries</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/admin/new-industry" key="t-p-grid">Create Industries</a></li>
                            <li><a href="/admin/industries" key="t-p-list">Industries List</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span key="t-projects">Teams</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/admin/new-team" key="t-p-grid">Create Team</a></li>
                            <li><a href="/admin/teams" key="t-p-list">Teams List</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span key="t-projects">Case Studies</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin/categories?type=case_studio" key="t-p-grid">Categories</a></li>
                            <li><a href="/admin/add-casestudio" key="t-p-list">Create Case Studio</a></li>
                            <li><a href="/admin/casestudios" key="t-p-list">Case Studio List</a></li>
                        </ul>
                    </li> --}}


                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-detail"></i>
                            <span key="t-blog">Blog</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/admin/categories?type=blogs" key="t-p-grid">Categories</a></li>
                            <li><a href="/admin/create-blog" key="t-blog-list">New Blog</a></li>
                            <li><a href="/admin/blogs" key="t-blog-list">Blog List</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="/admin/contact-enquires" class="waves-effect">
                            <i class="bx bxs-user-detail"></i>
                            <span key="t-contacts">Contacts Enquires</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect has-arrow">
                            <i class='bx bx-cog'></i>
                            <span key="t-jobs">Setting</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="/admin/genral-setting" key="t-job-list">General Setting</a></li>
                            <li><a href="/admin/pages-setting" key="t-job-list">Breadcump & Seo Setting</a></li>

                        </ul>
                    </li>

                    <li>
                        <a onclick="return confirm('Logout ?')" href="/logout" class="waves-effect">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z"></path>
                            </svg>
                            <span key="t-jobs">Log Out</span>
                        </a>

                    </li>

                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    @yield('content')




    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ url('admin') }}/assets/libs/jquery/jquery.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ url('admin') }}/assets/libs/jquery.repeater/jquery.repeater.min.js"></script>

    <script src="{{ url('admin') }}/assets/js/pages/form-repeater.int.js"></script>


    <!-- apexcharts -->
    <script src="{{ url('admin') }}/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- dashboard init -->
    <script src="{{ url('admin') }}/assets/js/pages/dashboard.init.js"></script>



    <!-- Plugins js -->
    <script src="{{ url('admin') }}/assets/libs/dropzone/dropzone-min.js"></script>

    <!-- Form file upload init js -->
    <script src="{{ url('admin') }}/assets/js/pages/form-file-upload.init.js"></script>
    <!-- App js -->
    <script src="{{ url('admin') }}/assets/js/app.js"></script>

    @yield('footer')
    
    @yield('scripts')

</body>



</html>
