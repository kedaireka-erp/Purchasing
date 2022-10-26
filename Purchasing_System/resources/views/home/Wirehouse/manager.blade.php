@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Sistem Purchasing')

@section('title_content', 'Manager Warehouse Purchasing')

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
                                Jumlah Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:#ABD9FF; font-size: 30px">{{ $orders }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bag-fill fa-2x text-gray-300" style="color:#ABD9FF"></i>
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
                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#FF1E1E; font-size: 15px">
                              Jumlah Reject </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:#FF1E1E; font-size:30px">{{ $reject }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-x-circle-fill fa-2x text-gray-300" style="color:#FF1E1E"></i>
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
                                Jumlah Powder</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:#C7F2A4; font-size:30px">{{  $jmlpowder }} </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-card-list fa-2x text-gray-300" style="color:#C7F2A4"></i>
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
                                Jumlah Other Good</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" style="color:#FFD384; font-size: 30px">{{  $jmlother }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-card-list fa-2x text-gray-300"  style="color:#FFD384"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <div class="row">
    <div class="col-xl-5 col-sm-6">
        <div class="card  border-left-success shadow h-100 py-2">
            <div class="card-header border-0">
                <div>
                    <h4 class="fs-20 font-w700" style="font-weight:500">Purchase Status </h4>
                    <span class="fs-14 font-w400 d-block">Pending ,Done and Reject</span>
                </div>	
            </div>	
            <div class="card-body">
                <div id="emailchart"> </div>
                <div class="mb-3 mt-4">
                    <h4 class="fs-18 font-w600">Keterangan</h4>
                </div>
                <div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <span class="fs-18 font-w500">	
                            <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="20" rx="6" fill="#FFFF00 "></rect>
                            </svg>
                           PR Pending 
                        </span>
                        <span class="fs-18 font-w600">{{ $pending }}</span>
                    </div>
                  
                    <div class="d-flex align-items-center justify-content-between  mb-4">
                        <span class="fs-18 font-w500">	
                            <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="20" rx="6" fill="#38E54D"></rect>
                            </svg>
                            PR ACC Selesai 
                        </span>
                        <span class="fs-18 font-w600">{{ $prapprove }} </span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between  mb-4">
                        <span class="fs-18 font-w500">	
                            <svg class="me-3" width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="20" height="20" rx="6" fill="#FF1E1E"></rect>
                            </svg>
                            PR Reject
                        </span>
                        <span class="fs-18 font-w600">{{ $reject }} </span>
                    </div>
                  
                </div>
                
            </div>
        </div>
    </div>	

    <div class="col-xl-7 col-sm-6">
        <div class="card  border-left-success shadow h-100 py-2">
            <div class="card-header border-0">
                <div>
                    <h4 class="fs-20 font-w700" style="font-weight:500">Request Terbaru</h4>
                </div>	
            </div>	
            <div class="card-body">
                <table  class="table" style="box-shadow: none; border:none">
                    <thead>
                        <tr class="content-control-md" align="center">
                            <td class="content-control" width="5%">No</td>
                            <td class="content-control" width="20%">Pengajuan</td>
                            <td class="content-control" width="20%">Requester</td>
                            <td class="content-control" width="15%">Divisi</td>
                            <td class="content-control" width="15%">Type</td>
                            <td class="content-control" width="25%">Status</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $purchase_tabel as $no => $purchase_request)
                        <tr align="center">
                            <td class="content-control-sm">{{ $no + 1}}</td>
                            <td class="content-control-sm">
                                {{ \Carbon\Carbon::parse($purchase_request ->created_at)->format('d/m/Y') }}</td>
                            <td class="content-control-sm">{{ $purchase_request ->requester }}</td>
                            <td class="content-control-sm">{{ $purchase_request ->Prefixe->divisi }}</td>
                            <td class="content-control-sm">{{ $purchase_request->type }}</td>
                            <td class="content-control-sm">
                                @include('purchases.status')
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{ $purchase_tabel ->links()}}
            </div>
        </div>
    </div>
</div>
<div class="footeh" style="margin-top:100px">
<!-- Required vendors -->

<script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

<!-- Apex Chart -->
<script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>

<!-- Chart piety plugin files -->
<script src="{{ asset('assets/vendor/peity/jquery.peity.min.js') }}"></script>
<!-- Dashboard 1 -->
<script src="{{ asset('assets/js/dashboard/dashboard-1.js') }}"></script>

<script src="{{ asset('assets/vendor/owl-carousel/owl.carousel.js') }}"></script>

<script>
  var emailchart = function(){
     var options = {
        labels: [
            'Done',
            'Pending',
            'Reject'
            ],
      series: [ {!! json_encode($prapprove) !!},{!! json_encode($pending) !!},{!! json_encode($reject) !!}],
      chart: {
      type: 'donut',
      height:300
    },
    dataLabels:{
        enabled: false
    },
    stroke: {
      width: 0,
    },
    colors:['#38E54D','#FFFF00','#FF1E1E'],
    legend: {
          position: 'bottom',
          show:false
        },
    responsive: [{
      breakpoint: 1800,
      options: {
       chart: {
          height:200
        },
      }
    },
    {
      breakpoint: 1800,
      options: {
       chart: {
          height:200
        },
      }
    }
    ]
    };

    var chart = new ApexCharts(document.querySelector("#emailchart"), options);
    chart.render();

}
  
</script>
@endsection
