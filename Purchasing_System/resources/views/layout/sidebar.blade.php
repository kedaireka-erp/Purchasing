<!doctype html>
<html lang="en">

<head>
    <x-style></x-style>
</head>

<body>



    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <div id="logo">
                    <img class="logo" src="{{ asset('images/home_logo.png') }}"
                        style="width:90%; height:80%; margin:top">
                </div>

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                @yield('title_content')
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">

                                <h4 style="padding: 5px">Tim Purchasing</h4>

                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">

                                    <img src="{{ asset('images/profile/profil.png') }}" width="56" alt="">

                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    {{-- <a href="/profile" class="dropdown-item ai-iconml-1s">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg"
                                            class="text-primary ml-2" width="18" height="18" viewbox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span>Profile </span>
                                    </a> --}}


                                    {{-- <span class="ms-2"> --}}
                                    <a href="#"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                        class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        <i class="dw dw-logout"></i>Log Out
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                                        @csrf
                                        {{-- <button type="submit" class="dropdown-item"> --}}
                                    </form>
                                    {{-- </span> --}}
                                    {{-- </a> --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->





        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">

                    @role('Purchasing')
                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/admin_divisi') }}">Dashboard Admin Divisi</a></li>
                                <li><a href="{{ url('/manager') }}">Dashboard Manager</a></li>
                                <li><a href="{{ url('/') }}">Dashboard Purchasing</a></li>
                            </ul>
                        </li>

                        <li><a href="/approval/accept" class="" aria-expanded="false">
                                <i class="bi bi-check-circle-fill"></i>
                                <span class="nav-text">Approval</span>
                            </a>
                        </li>
                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-basket2-fill"></i>

                                <span class="nav-text">Order</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="/order">Purchase Order</a></li>
                                <li><a href="/order/create">Buat PO</a></li>

                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Master Order</a>
                                    <ul aria-expanded="false">
                                        <li><a href="/supplier">Master Supllier</a></li>
                                        <li><a href="/payment">Master Payment</a></li>
                                        <li><a href="/timeshipping">Master TimeShipping</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endrole


                    @role('Manager Sales')
                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-check-circle-fill"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/sales') }}">Admin Divisi Sales</a></li>
                                <li><a href="{{ url('/manager_sales') }}">Manager Sales</a></li>
                            </ul>
                        </li>
                        <li><a href="/manager_sales/approval" class="" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">Sales Approval</span>
                            </a>
                        </li>
                    @endrole
                    @role('Manager Finance')
                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/finance') }}">Admin Divisi Finance</a></li>
                                <li><a href="{{ url('/manager_finance') }}">Manager Finance</a></li>
                            </ul>
                        </li>
                        <li><a href="/manager_finance/approval" class="" aria-expanded="false">
                                <i class="bi bi-check-circle-fill"></i>
                                <span class="nav-text">Finance Approval</span>
                            </a>
                        </li>
                    @endrole

                    @role('Manager Wirehouse')
                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('/wirehouse') }}">Admin Divisi WO</a></li>
                                <li><a href="{{ url('/manager_wirehouse') }}">Manager WO</a></li>
                            </ul>
                        </li>
                        <li><a href="/manager_wirehouse/approval" class="" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">WO Approval</span>
                            </a>
                        </li>
                    @endrole


                    @can('sales_role_purchasing')
                        <li><a href="/sales" class="" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">Sales Dashboard</span>
                            </a>



                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-clipboard2-fill"></i>
                                <span class="nav-text">Sales Request</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('sales/purchase_request') }}">Purchase Request</a></li>
                                <li><a href="{{ url('sales/purchase_request/create') }}">Buat PR</a></li>
                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Master
                                        Request</a>
                                    <ul aria-expanded="false">
                                        <li><a href="/masteritem">Master Item</a></li>
                                        <li><a href="/prefix">Master Prefix</a></li>
                                        <li><a href="/location">Master Lokasi</a></li>
                                        <li><a href="/colour">Master Color</a></li>
                                        <li><a href="/satuan">Master Satuan</a></li>
                                        <li><a href="/grade">Master Grade</a></li>
                                        <li><a href="/ships">Master Kebutuhan</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endcan

                    @role('Finance')
                        <li><a href="/finance" class="" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">Finance Dashboard</span>
                            </a>
                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-clipboard2-fill"></i>
                                <span class="nav-text">Finance Request</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('finance/purchase_request') }}">Purchase Request</a></li>
                                <li><a href="{{ url('finance/purchase_request/create') }}">Buat PR</a></li>
                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Master
                                        Request</a>
                                    <ul aria-expanded="false">
                                        <li><a href="/masteritem">Master Item</a></li>
                                        <li><a href="/prefix">Master Prefix</a></li>
                                        <li><a href="/location">Master Lokasi</a></li>
                                        <li><a href="/colour">Master Color</a></li>
                                        <li><a href="/satuan">Master Satuan</a></li>
                                        <li><a href="/grade">Master Grade</a></li>
                                        <li><a href="/ships">Master Kebutuhan</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endrole

                    @role('Wirehouse')
                        <li><a href="/wirehouse" class="" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <span class="nav-text">WO Dashboard</span>
                            </a>
                        </li>

                        <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                                <i class="bi bi-clipboard2-fill"></i>
                                <span class="nav-text">WO Request</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="{{ url('wirehouse/purchase_request') }}">Purchase Request</a></li>
                                <li><a href="{{ url('wirehouse/purchase_request/create') }}">Buat PR</a></li>
                                <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Master
                                        Request</a>
                                    <ul aria-expanded="false">
                                        <li><a href="/masteritem">Master Item</a></li>
                                        <li><a href="/prefix">Master Prefix</a></li>
                                        <li><a href="/location">Master Lokasi</a></li>
                                        <li><a href="/colour">Master Color</a></li>
                                        <li><a href="/satuan">Master Satuan</a></li>
                                        <li><a href="/grade">Master Grade</a></li>
                                        <li><a href="/ships">Master Kebutuhan</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @endrole



                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-chart-line"></i>

                            <span class="nav-text">Tracking</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/tracking/approval">Approval Tracking</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Request
                                    Tracking</a>
                                <ul aria-expanded="false">
                                    <li><a href="/tracking/powder">Powder</a></li>
                                    <li><a href="/tracking/good">Other Good</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                @yield('wrap_title')
                @yield('content')
            </div>


        </div>
        <!--**********************************
            Content body end
        ***********************************-->




        <!--**********************************
        Scripts
    ***********************************-->
        <!-- Required vendors -->




        <script>
            function cardsCenter() {

                /*  testimonial one function by = owl.carousel.js */



                jQuery('.card-slider').owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    //center:true,
                    slideSpeed: 3000,
                    paginationSpeed: 3000,
                    dots: true,
                    navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                    responsive: {
                        0: {
                            items: 1
                        },
                        576: {
                            items: 1
                        },
                        800: {
                            items: 1
                        },
                        991: {
                            items: 1
                        },
                        1200: {
                            items: 1
                        },
                        1600: {
                            items: 1
                        }
                    }
                })
            }

            jQuery(window).on('load', function() {
                setTimeout(function() {
                    cardsCenter();
                }, 1000);
            });
        </script>
        <x-script></x-script>

</body>

</html>
