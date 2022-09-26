@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Grade')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">

@endsection

{{-- @section('Judul-content')
    <div class="title-page">
        Purchase Request
    </div>
@endsection --}}

@section('title_content', 'Master TimeShipping')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master TimeShipping</a></li>
        </ol>
    </div>
@endsection

@section('content')
    {{-- <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form action="{{ route('timeshipping.') }}" method="get">
                        <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="{{ request('search') }}">
                    </form>
                </div>
                <div class="col-lg-4 col-md-2"></div>
                <div class="col-lg-3 col-md-4">
                    

                </div>
            </div>
        </div>
    </div> --}}
    <div class="card">
        <div id="chead">
            <div class="row">
                <div class="col-8">
                    <div class="card-header">
                        <h4 class="card-title">Data Master TimeShipping</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <a class="btn btn-primary" href="/timeshipping/download" role="button" id="excel"> <i
                            class="fa fa-file-excel-o"></i> Excel </a>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <div id="button_add">
                        <a onclick="timeshipping_create()" class="btn btn-success" id="add"> +Add Data
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
                            <td width="25%"> Shipping Time </td>
                            <td width="25%"> Tanggal Pembuatan </td>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($timeshipping as $value)
                            <tr align="center">
                                <td class="content-control">{{ $loop->iteration }}</td>
                                <td class="content-control">{{ $value->name }}</td>
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
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalTimeshippingCenter" class="dropdown-item"
                                                    onClick="timeshipping_view({{ $value->id }})">Detail</a>
                                                    
                                                    <a
                                                    data-bs-toggle="modal" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalTimeshippingCenter"
                                                    onClick="timeshipping_edit({{ $value->id }})">Edit</a>
                                                <form action="{{ route('timeshipping.destroy', $value->id) }}" method="POST">
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
        <div class="modal fade" id="exampleModalTimeshippingCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" align="center" id="TimeshippingModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="timeshipping_page" class="pd-2"></div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
                <script>
                    function timeshipping_create() {
                        $.get("{{ route('timeshipping.create') }}", {}, function(data, status) {
                            $("#TimeshippingModalLabel").html('Add Timeshipping');
                            $("#timeshipping_page").html(data);
                            $("#exampleModalTimeshippingCenter").modal('show');
                        })
                    }
                
                    function timeshipping_edit(id) {
                        $.get("{{ url('timeshipping/edit') }}/" + id, {}, function(data, status) {
                            $("#TimeshippingModalLabel").html('Edit Timeshipping');
                            $("#timeshipping_page").html(data);
                            $("#exampleModalTimeshippingCenter").modal('show');
                        })
                    }
                
                    function timeshipping_view(id) {
                        $.get("{{ url('timeshipping/view') }}/" + id, {}, function(data, status) {
                            $("#TimeshippingModalLabel").html('View Timeshipping');
                            $("#timeshipping_page").html(data);
                            $("#exampleModalTimeshippingCenter").modal('show');
                        })
                    }
                </script>

    @endsection
