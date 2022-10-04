@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Sistem Purchasing')

@section('Judul-content')
    <div class="title-page">
        Dashboard System Purchasing
    </div>


@endsection

@section('content')


    <!-- Content Row -->
    <div class="row" style="margin-top:40px">

        <!-- Earnings (Monthly) Card Example -->
  
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#ABD9FF; font-size: 15px">
                                Jumlah Divisi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:#ABD9FF; font-size: 30px">{{ $divisi }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-person-badge fa-2x text-gray-300" style="color:#ABD9FF"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:plum; font-size: 15px">
                                Jumlah Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:plum; font-size:30px">{{  $orders }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bag-fill fa-2x text-gray-300" style="color:plum"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:#C7F2A4; font-size: 15px">
                                PR Selesai ACC</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:#C7F2A4; font-size:30px">{{ $prapprove }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clipboard2-check-fill fa-2x text-gray-300" style="color:#C7F2A4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold  text-uppercase mb-1" style="color:#FFD384; font-size: 15px">
                                PR Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:#FFD384; font-size: 30px">{{ $pending }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-clock-history fa-2x text-gray-300"  style="color:#FFD384"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
