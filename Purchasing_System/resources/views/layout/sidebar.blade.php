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

                                <h4 style="padding: 5px">Laman Purchasing</h4>

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

                            {{-- INI --}}

                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg width="28" height="28" viewbox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M23.3333 19.8333H23.1187C23.2568 19.4597 23.3295 19.065 23.3333 18.6666V12.8333C23.3294 10.7663 22.6402 8.75902 21.3735 7.12565C20.1068 5.49228 18.3343 4.32508 16.3333 3.80679V3.49996C16.3333 2.88112 16.0875 2.28763 15.6499 1.85004C15.2123 1.41246 14.6188 1.16663 14 1.16663C13.3812 1.16663 12.7877 1.41246 12.3501 1.85004C11.9125 2.28763 11.6667 2.88112 11.6667 3.49996V3.80679C9.66574 4.32508 7.89317 5.49228 6.6265 7.12565C5.35983 8.75902 4.67058 10.7663 4.66667 12.8333V18.6666C4.67053 19.065 4.74316 19.4597 4.88133 19.8333H4.66667C4.35725 19.8333 4.0605 19.9562 3.84171 20.175C3.62292 20.3938 3.5 20.6905 3.5 21C3.5 21.3094 3.62292 21.6061 3.84171 21.8249C4.0605 22.0437 4.35725 22.1666 4.66667 22.1666H23.3333C23.6428 22.1666 23.9395 22.0437 24.1583 21.8249C24.3771 21.6061 24.5 21.3094 24.5 21C24.5 20.6905 24.3771 20.3938 24.1583 20.175C23.9395 19.9562 23.6428 19.8333 23.3333 19.8333Z" fill="#717579"></path>
										<path d="M9.9819 24.5C10.3863 25.2088 10.971 25.7981 11.6766 26.2079C12.3823 26.6178 13.1838 26.8337 13.9999 26.8337C14.816 26.8337 15.6175 26.6178 16.3232 26.2079C17.0288 25.7981 17.6135 25.2088 18.0179 24.5H9.9819Z" fill="#717579"></path>
									</svg>
                                    <span class="badge light text-white bg-warning rounded-circle">{{ $count }}</span>
                                
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                <div id="DZ_W_Notification1" class="widget-media dlab-scroll p-3" style="height:380px;">
                                    <ul class="timeline">
                                        @foreach ($notification as $note  => $purchase_request)
                                        <li>
                                            <div class="timeline-panel">
                                                @if ($purchase_request->status == 'new')
                                                <div class="media me-2 media-danger">
                                                    {{-- <img alt="image" width="50" src="images/avatar/1.jpg"> --}}
                                                </div>
                                                @elseif ($purchase_request->status == 'read')
                                                <div class="media me-2">
                                                    {{-- <img alt="image" width="50" src="images/avatar/1.jpg"> --}}
                                                    <div class="timeline-badge primary"></div>
                                                </div>
                                                @endif
                                                {{-- @if ($purchase_request->role == 'sales') --}}
                                                <div class="media-body">
                                                    <h6 class="mb-1">{{ $purchase_request->message }}</h6>
                                                    <small class="d-block">{{ $purchase_request->created_at }}</small>
                                                    <form
                                                        action="{{ route('purchase_request.view', $purchase_request->id_request) }}"
                                                        method="GET">
                                                        @csrf
                                                        @method('GET')
                                                        <input type="submit" class="dropdown-item" value="Lihat PR">
                                                    </form>
                                                </div>
                                                {{-- @endif --}}
                                            </div>
                                            
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a class="all-notification" href="javascript:void(0);">See all notifications <i class="ti-arrow-end"></i></a>
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

                    @role('Admin')
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
                <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="bi bi-basket2-fill"></i>

                    <span class="nav-text">Order</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/order">Purchase Order</a></li>
                </ul>
            </li>


                    @endrole

                    @can('role_purchasing')
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
                    @endcan


                    @can('manager_sales_role_purchasing') 
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-home"></i>
                            
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/manager_sales/admin/sales') }}">Admin Divisi Sales</a></li>
                            <li><a href="{{ url('/manager_sales') }}">Manager Sales</a></li>
                        </ul>
                    </li>
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
                    <li><a href="/manager_sales/approval" class="" aria-expanded="false">
                        <i class="bi bi-check-circle-fill"></i>
                            <span class="nav-text">Sales Approval</span>
                        </a>
                    </li>
                    @endcan

                    @can('manager_finance_role_purchasing')
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/manager_finance/admin/finance') }}">Admin Divisi Finance</a></li>
                            <li><a href="{{ url('/manager_finance') }}">Manager Finance</a></li>
                        </ul>
                    </li>
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
                    <li><a href="/manager_finance/approval" class="" aria-expanded="false">
                            <i class="bi bi-check-circle-fill"></i>
                            <span class="nav-text">Finance Approval</span>
                        </a>
                    </li>
                    @endcan

                    @can('manager_wirehouse_role_purchasing')
                    <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{ url('/manager_wirehouse/admin/wirehouse') }}">Admin Divisi WO</a></li>
                            <li><a href="{{ url('/manager_wirehouse') }}">Manager WO</a></li>
                        </ul>
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
                    <li><a href="/manager_wirehouse/approval" class="" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">WO Approval</span>
                        </a>
                    </li>
                    @endcan


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

                    @can('finance_role_purchasing')
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
                    @endcan

                    @can('wirehouse_role_purchasing')
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
                    @endcan



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
