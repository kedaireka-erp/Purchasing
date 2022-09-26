@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Supplier')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

@endsection
@section('title_content', 'Master Supplier')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Supplier</a></li>
        </ol>
    </div>
@endsection

@section('content')
 
    <div class="card">
        <div id="chead">
            <div class="row">
                <div class="col-8">
                    <div class="card-header">
                        <h4 class="card-title">Data Master Supplier</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <a class="btn btn-primary" href="/supplier/download" role="button" id="excel"> <i
                            class="fa fa-file-excel-o"></i> Excel </a>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <div id="button_add">
                        <a onclick="supplier_create()" class="btn btn-success" id="add"> +Add Data
                        </a>
                    </div>
                </div>


            </div>
            <hr>
        </div>
        <x-alert></x-alert>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr align="center">
                            <td width="10%"> No.</td>
                            <td width="25%"> Vendor </td>
                            <td width="25%"> Tanggal Pembuatan </td>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $value)
                            <tr align="center">
                                <td class="content-control">{{ $loop->iteration }}</td>
                                <td class="content-control">{{ $value->vendor }}</td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}
                                </td>
                                <td class="py-2 text-end">
                                    <div class="dropdown text-sans-serif"><button
                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                            id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                    height="18px" viewbox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24">
                                                        </rect>
                                                        <circle fill="#000000" cx="5" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12"
                                                            r="2">
                                                        </circle>
                                                    </g>
                                                </svg></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-1">
                                            <div class="py-2">
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalSupplierCenter" class="dropdown-item"
                                                    onClick="supplier_view({{ $value->id }})">Detail</a><a
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalSupplierCenter" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalSupplierCenter"
                                                    onClick="supplier_edit({{ $value->id }})">Edit</a>
                                                <form action="{{ route('supplier.destroy', $value->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item text-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>


        

        <!-- Required vendors -->
        <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/vendor/chart.js/Chart.bundle.min.js') }}"></script> --}}
        <!-- Apex Chart -->
        {{-- <script src="{{ asset('assets/vendor/apexchart/apexchart.js') }}"></script> --}}

        <!-- Datatable -->
        {{-- <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

        <script src="{{ asset('assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>

        <script src="{{ asset('assets/js/custom.min.js') }}"></script>
        <script src="{{ asset('assets/js/dlabnav-init.js') }}"></script> --}}
 <!-- Modal -->
 <div class="modal fade" id="exampleModalSupplierCenter">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" align="center" id="SupplierModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <div id="supplier_page" class="pd-2"></div>
            </div>
        </div>
    </div>
</div>
        <script>
            function supplier_create() {
                $.get("{{ route('supplier.create') }}", {}, function(data, status) {
                    $("#SupplierModalLabel").html('Add Supplier');
                    $("#supplier_page").html(data);
                    $("#exampleModalSupplierCenter").modal('show');
                })
            }
        
            function supplier_edit(id) {
                $.get("{{ url('supplier/edit') }}/" + id, {}, function(data, status) {
                    $("#SupplierModalLabel").html('Edit Supplier');
                    $("#supplier_page").html(data);
                    $("#exampleModalSupplierCenter").modal('show');
                })
            }
        
            function supplier_view(id) {
                $.get("{{ url('supplier/view') }}/" + id, {}, function(data, status) {
                    $("#SupplierModalLabel").html('View Supplier');
                    $("#supplier_page").html(data);
                    $("#exampleModalSupplierCenter").modal('show');
                })
            }
        </script>
    @endsection
