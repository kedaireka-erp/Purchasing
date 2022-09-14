<nav id="sidebar">

    <div id="logo">
        <img class="logo" src="{{ asset('images/home_logo.png') }}">
    </div>

    <div id="profile">
        <div class="row">
            <div class="col-4">
                <img class="photo m-3" style="width:60px; height:60px;border-radius:100%"
                    src="{{ asset('images/profile/profil.png') }}">
            </div>
            <div class="col-8">
                <div class="mt-4">
                    <span class="name"> Muhammad Afifudin </span>
                    <span class="role"> Development </span>
                </div>
            </div>
        </div>
    </div>


    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="menu ml-3 mt-2">

        <ul class="list-unstyled components mb-5">

            <li>
                <div class="row">
                    <div class="col-1 pt-2">
                        <i class="fa fa-dashboard"></i>
                    </div>
                    <div class="col-9">
                        <a href="/">Dashboard</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="col-1 pt-2">
                        <i class="bi bi-bag"></i>
                    </div>
                    <div class="col-9">
                        <a href="/purchase_request"> Purchase Request</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </li>

            <li>
                <div class="row">
                    <div class="col-1 pt-2">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <div class="col-8">
                        <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample">Master Request</a>
                    </div>
                    <div class="col-2 pt-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg></div>
                    <div class="col-1"></div>
                </div>
            </li>

            <div class="collapse" id="collapseExample">
                <div class="list-request" style="margin-left: 40px">

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
                <div class="row">
                    <div class="col-1 pt-2">
                        <i class="fa fa-check-square-o"></i>
                    </div>
                    <div class="col-9">
                        <a href="/approval"> Approval</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </li>


            <li>
                <div class="row">
                    <div class="col-1 pt-2">
                        <i class="bi bi-cart-check-fill"></i>
                    </div>
                    <div class="col-8">
                        <a data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false"
                            aria-controls="collapseExample">Master Order</a>
                    </div>
                    <div class="col-2 pt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                        </svg>
                    </div>
                    <div class="col-1"></div>
                </div>
            </li>
            <div class="collapse" id="collapseExample2">
                <div class="list-order" style="margin-left: 40px">

                    <li>
                        <a href="#">Master Waktu Pengiriman</a>
                    </li>
                    <li>
                        <a href="#">Master Pembayaran</a>
                    </li>

                </div>
            </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-1 pt-2">
                        <i class="bi bi-hourglass"></i>
                    </div>
                    <div class="col-9">
                        <a href="/tracking">Request Tracking</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </li>
            <li>
                <div class="row">
                    <div class="col-1 pt-2">
                        <i class="bi bi-cart3"></i>
                    </div>
                    <div class="col-9">
                        <a href="#">Purchase Order</a>
                    </div>
                    <div class="col-2"></div>
                </div>
            </li>
        </ul>
</nav>
