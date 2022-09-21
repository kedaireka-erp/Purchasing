@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Order')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

@endsection
@section('title_content', 'Purchase Order')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Order</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Purchase Order</a></li>
        </ol>
    </div>
@endsection
@section('content')
    {{-- <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form action="/" method="get">
                        <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="">
                    </form>
                </div>
                <div class="col-lg-4 col-md-2"></div>
                <div class="col-lg-3 col-md-4">
                    {{-- <div id="button_add">
                        <a href="/" class="btn btn-success" id="add"> +Add Data
                        </a>
                    </div> --}}

                {{-- </div>
            </div>
        </div>
    </div> --}} 

    {{-- <div class="container">
        <h1>Purchase Request</h1>
        <form method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control"
                    placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
                <button class="btn btn-success" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
        <div class="col-12">
            <a href="{{ route('purchase_request.create') }}" class="btn btn-primary" type="submit">Add</a>
        </div> --}}
        <div class="card">
            <div id="chead">
                <div class="row">
                    <div class="col-9">
                        <div class="card-header">
                            <h4 class="card-title">Data Purchase Request Diterima</h4>
                        </div>
                    </div>
                    {{-- <div class="col-3">
                        <div id="button_add">
                              
                            <a href="{{ route('purchase_request.create') }}" class="btn btn-success" id="add"> +Buat PO
                            </a>
                        </div>
                    </div> --}}
    
    
                </div>
                <hr>
            </div>
    
    
    <div class="card-body">
        <div class="table-responsive">
            <form action="{{ route('order.orderstore') }}" method="post">
                  @csrf
            <table id="example3" class="display" style="width:100%">
                <thead>
                    <tr align="right">
                        
                        <td align="left">Nomor PR</td>
                        <td>Deadline Date</td>
                        <td>Nama Barang</td>
                        <td>Quantity</td>
                        {{-- <td>Unit</td> --}}
                        <td>Requester</td>
                        <td>Divisi</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                  

                 

                  @foreach ($purchase_requests as $no => $item)
                  <tr align="right">
                      <td class="content-control" align="left">{{ $item->order->get(0)->no_po }}</td>
                      <td class="content-control">
                          {{ \Carbon\Carbon::parse($item->deadline_date)->format('d F Y') }}</td>
                          <td>
                              @foreach ($item->item as $no => $it)
                                  <ul>{{ $it->master_item->item_name }}</ul>
                              @endforeach
                          </td>
                          <td>
                              @foreach ($item->item as $no => $it)
                                  <ul>{{ $it->stok }}</ul>
                              @endforeach
                          </td>
                          {{-- <td>
                              @foreach ($item->item as $no => $it)
                                  <ul>{{ $it->satuan->unit }}</ul>
                              @endforeach
                          </td> --}}
                          <td class="content-control" align="left">{{ $item->requester }}</td>
                          <td class="content-control" align="left">{{ $item->Prefixe->divisi }}</td>
                          <td>
                              <form method="GET" action="/" style="margin-right:10px">
                                  @csrf
                                  <input type="hidden" value="EDIT" name="_method">
                                  <button type="submit" class="btn btn-warning" id="edit"> <i
                                          class="fa fa-edit"></i>
                                  </button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                </tbody>
            </table>
           
        </div>
    </div>

        </div>
        </div>

    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Apex Chart -->
    <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script> --}}
@endsection
