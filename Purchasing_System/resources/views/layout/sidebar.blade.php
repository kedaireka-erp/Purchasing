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

                                    <img src="images/profile/profil.png" width="56" alt="">

                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    <a href="page-error-404.html" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewbox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
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
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/">Dashboard Admin Divisi</a></li>
                            <li><a href="/adminmana">Dashboard Manager</a></li>
                            <li><a href="/adminpur">Dashboard Purchasing</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-clipboard2-fill"></i>
                            <span class="nav-text">Request</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/purchase_request">Purchase Request</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Master Request</a>
                                <ul aria-expanded="false">
                                    <li><a href="/masteritem">Master Item</a></li>
                                    <li><a href="/prefix">Master Prefix</a></li>
                                    <li><a href="/location">Master Lokasi</a></li>
                                    <li><a href="/satuan">Master Satuan</a></li>
                                    <li><a href="/grade">Master Grade</a></li>
                                    <li><a href="/ships">Master Kebutuhan</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-check-circle-fill"></i>
                            <span class="nav-text">Approval</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/approval">Approval Manager</a></li>
                            <li><a href="/aa">Approval Tim Purchasing</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="bi bi-basket2-fill"></i>

                            <span class="nav-text">Order</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="/order">Purchase Order</a></li>
                            <li><a href="/order/create">Buat Purchase Order</a></li>

                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Master Order</a>
                                <ul aria-expanded="false">
                                    <li><a href="ecom-product-grid.html">Master Waktu</a></li>
                                    <li><a href="ecom-product-list.html">Master Suppley</a></li>
                                    <li><a href="ecom-product-detail.html">Master Pembayaran</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/tracking" aria-expanded="false">
                            <i class="fas fa-chart-line"></i>
                            <span class="nav-text">Request Tracking</span>

                        </a>
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
            <div class="container">
                @yield('wrap_title')
                {{-- @yield('Judul-content')
                <hr> --}}
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
