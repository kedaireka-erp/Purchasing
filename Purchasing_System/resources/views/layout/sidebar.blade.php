<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('layout/mastersatuan.css') }}">
    {{-- <<========= Ini Title ========>> --}}
    <title> @yield('judul-laman') </title>
    {{-- <<========= Finish Title ========>> --}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{-- <<========= Google Font ========>> --}}
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    {{-- <<========= Finish Google Font ========>> --}}


    {{-- <<========= Logo expand ========>> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <<========= Finish Logo expand ========>> --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('layout/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/update.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/tampil.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/form.css') }}">
    <link rel="stylesheet" href="{{ asset('layout/viewpr.css') }}">
</head>

<body>


    
    {{-- <<========= Sidebar ========>> --}}
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">

            <div id="logo">
                <img class="logo" src="{{ asset('images/home_logo.png') }}">
            </div>
                <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">


        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
        
                <img class="img-profile rounded-circle img-thumbnail ml-3"
                    src="{{asset('images/undraw_Profile.svg')}}" style="width:20%">
                    <span class="d-none d-lg-inline text-gray-600 small">Tim Purchasing</span>
         
        </li>

    </ul>


            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">

                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="/"><i class="fa fa-dashboard"></i>    Dashboard</a>
                    </li>
                    <li>
                        <a href="/purchase"></i><i class="bi bi-bag"></i>    Purchase Request</a>
                    </li>

                    <li>
                        <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample"><i class="bi bi-bag-check"></i>
                              Master Request <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </a>
                    </li>
                    <div class="collapse" id="collapseExample">
                        <div class="list-request" style="margin-left: 20px">

                            <li>
                                <a href="/masteritem">Master Item</a>
                            </li>
                            <li>
                                <a href="/satuan">Master Satuan</a>
                            </li>
                            <li>
                                <a href="/prefix">Master Prefix</a>
                            </li>
                            <li>
                                <a href="/location">Master Lokasi</a>
                            </li>
                            <li>
                                <a href="/ships">Master Kebutuhan </a>
                            </li>
                        </div>
                    </div>
                    <li>
                        <a href="#"><i class="fa fa-check-square-o"></i>    Approval</a>
                    </li>


                    <li>
                        <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
                            aria-controls="collapseExample"><i class="bi bi-cart-check-fill"></i>  
                              Master Order <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </a>
                    </li>
                    <div class="collapse" id="collapseExample2">
                        <div class="list-order" style="margin-left: 20px">

                            <li>
                                <a href="#">Master Waktu Peengiriman</a>
                            </li>
                            <li>
                                <a href="#">Master Pembayaran</a>
                            </li>

                        </div>
                    </div>
                    </li>
                    <li>
                        <a href="#"><i class="bi bi-hourglass"></i>    Request Tracking</a>
                    </li>
                    <li>
                        <a href="#"><i class="bi bi-cart3"></i>    Purchase Order</a>
                    </li>
                </ul>
        </nav>

        {{-- <<========= Finish Sidebar ========>> --}}


        {{-- <<========= Content ========>> --}}
        <!-- Page Content  -->
        <div id="content">



            {{-- navbar --}}
            <nav class="navbar navbar-light">
                <div class="container">

                    <a class="navbar-brand"></a>


                    <div class="dropdown">
                        

                            <div class="d-flex justify-content-between">
                                <div class="profiles">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown link
                                      </a>
                                </div>
                                <div class="down">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                                </div>
                            </div>
                          
                          
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="dropdown-item" href="#">Setting</a></li>
                          <li><a class="dropdown-item" href="#">Logout</a></li>
    
                        </ul>
                      </div>
    
                    {{-- <form>
            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow ">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="d-none d-lg-inline text-gray-600 small">Tim Purchasing</span>
                                <img class="img-profile rounded-circle img-thumbnail"
                                src="{{asset('images/undraw_Profile.svg')}}" style="width:10%">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                            
                                <div class="dropdown-divider"></div>
                                <form>
                                    @csrf
                                    <button type="submit" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>
                    </form> --}}
{{-- 
                    <div class="d-flex flex-row-reverse bd-highlight">
                        <div class="p-2 bd-highlight">                    <div class="dropdown">
                            <a class="profile" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </a>
                          
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                              <li><a class="dropdown-item" href="#">Setting</a></li>
                              <li><a class="dropdown-item" href="#">Logout</a></li>
        
                            </ul>
                          </div></div>
                        <div class="row">
                            <div class="col-lg-7"></div>
                            <div class="col-lg-1">
                                <div class="p-2 bd-highlight">
                                    <img class="img-profile rounded-circle img-thumbnail"
                                    src="{{asset('images/undraw_Profile.svg')}}" style="width:15%">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="p-2 bd-highlight">Time Purchasing</div>
                            </div>
                        </div>
                      </div>
                </div> --}}
               

            </nav>
            <div class="container">


                @yield('Judul-content')

                <hr>

                @yield('content')
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('layout/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('layout/main.js') }}"></script>
</body>
{{-- <<========= Finish Content ========>> --}}

</html>
