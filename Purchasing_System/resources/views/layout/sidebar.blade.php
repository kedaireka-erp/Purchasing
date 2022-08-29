<!doctype html>
<html lang="en">

<head>
    <title>Purchasing System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('layout/layout.css')}}">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">

            <div id="logo">
                <img class="logo" src="{{asset('images/home_logo.png')}}">
            </div>
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
             
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="#">Dasboard</a>
                    </li>
                    <li>
                        <a href="#">Purchase Request</a>
                    </li>

                    <li>
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master Request</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            
                            <li>
                                <a href="#">Master Item</a>
                            </li>
                            <li>
                                <a href="#">Master Lokasi</a>
                            </li>
                            <li>
                                <a href="#">Master Satuan</a>
                            </li>
                            <li>
                                <a href="#">Master Kebutuhan/Pengiriman</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">Approval</a>
                    </li>
   
                    <li>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Master Order</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li>
                                <a href="#">Master Waktu Pengiriman</a>
                            </li>
                            <li>
                                <a href="#">Master Pembayaran</a>
                            </li>
                           
                        </ul>
                    </li>
                    <li>
                        <a href="#">Request Tracking</a>
                    </li>
                    <li>
                        <a href="#">Purchase Order</a>
                    </li>
                </ul>

                {{-- <div class="mb-5">
                    <h3 class="h6">Subscribe for newsletter</h3>
                    <form action="#" class="colorlib-subscribe-form">
                        <div class="form-group d-flex">
                            <div class="icon"><span class="icon-paper-plane"></span></div>
                            <input type="text" class="form-control" placeholder="Enter Email Address">
                        </div>
                    </form>
                </div>

                <div class="footer">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div> --}}
        </nav>

        <!-- Page Content  -->
        <div id="content">
           

            
            {{-- navbar --}}
            <nav class="navbar navbar-light">
                <div class="container-fluid">
                  <a class="navbar-brand"></a>
                  <form class="d-flex">
                    {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button> --}}
                  </form>
                </div>
              </nav>
            <div class="container">


            <h2 class="mb-4">Sidebar #02</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
</div>
    <script type="text/javascript" src="{{URL::asset('layout/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('layout/main.js')}}"></script>
</body>

</html>