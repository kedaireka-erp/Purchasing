@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

@endsection
@section('title_content', 'Request Tracking')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request Tracking</a></li>
       
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
                            <h4 class="card-title">Data Request Tracking</h4>
                        </div>
                    </div>

    
    
                </div>
                <hr>
            </div>
    
    
    <div class="card-body">
        <div class="table-responsive">
           <table id="example3" class="display" style="width:100%">
                <thead>
                    <tr align="right">
                        {{-- <td align="center">
                                <div class="form-check custom-checkbox ms-2">
                                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </td> --}}
                            <td> Pilih </td>
                        <td align="left">Nomor PR</td>
                        {{-- <td>Nomer PO</td> --}}
                        <td>Deadline Date</td>
                        <td>Nama Barang</td>
                        <td>Outstanding</td>
                        <td>Sudah Datang</td>
                        <td>Requester</td>
                        <td>Divisi</td>
                    </tr>
                </thead>
                <tbody>
                   {{-- Ubah --}}
                    @foreach ($items as $no => $item)
                        <tr align="right">
                            <td align="center">
                                
                                    <input type="checkbox" name="ids[{{ $item->id }}]" value="{{ $item->id }}" class="form-check-input" id="customCheckBox2">
                                
                            </td>
                            <td class="content-control" align="center">{{ $item->no_pr }}</td>
                            {{-- <td class="content-control" align="center">{{ $item->get[0]->no-po}}</td> --}}
                            <td class="content-control" align="center">{{ $item->deadline_date }}</td>
                            <td class="content-control" align="center">{{ $item->item_name }}</td>
                            <td class="content-control" align="center">{{ $item->outstanding }}</td>
                            <td class="content-control" align="center">{{ $item->sudah_datang }}</td>
                            <td class="content-control" align="center">{{ $item->requester }}</td>
                            <td class="content-control" align="center">{{ $item->divisi }}</td>
                            {{-- <td class="content-control" align="left">{{ $item->purchase->get(0)->deadline_date }}</td> --}}
                            {{-- <td class="content-control" align="left">{{ $item->id_master_item }}</td>
                            <td class="content-control" align="left">{{ $item->stok }}</td>
                            <td class="content-control" align="left">{{ $item->outstanding }}</td> --}}
                        </tr>
                        @endforeach
                </tbody>
            </table>

            <table id="example3" class="display" style="width:100%">
                <thead>
                    <tr align="right">
                        {{-- <td align="center">
                              <div class="form-check custom-checkbox ms-2">
                                  <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                  <label class="form-check-label" for="checkAll"></label>
                              </div>
                          </td> --}}
                        <td> Pilih </td>
                        <td align="left">Nomor PR</td>
                        <td>Warna</td>
                        <td>Tipe</td>
                        <td>Vendor</td>
                        <td>Requester</td>
                        <td>Divisi</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($powders as $no => $itex)
                        <tr align="right">
                            <td align="center">

                                <input type="checkbox" name="ids[{{ $itex->id }}]"
                                    value="{{ $itex->id }}" class="form-check-input"
                                    id="customCheckBox2">

                            </td>
                            <td class="content-control" align="center">{{ $itex->no_pr }}</td>
                            <td class="content-control" align="center">{{ $itex->warna }}</td>
                            <td class="content-control" align="center">{{ $itex->type }}</td>
                            <td class="content-control" align="center">{{ $itex->vendor }}</td>
                            <td class="content-control" align="center">{{ $itex->requester }}</td>
                            <td class="content-control" align="center">{{ $itex->divisi }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
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
