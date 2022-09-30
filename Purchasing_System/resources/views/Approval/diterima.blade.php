@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Approval')

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

@section('title_content', 'Approval Tim Purchasing')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Approval</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Approval Tim Purchasing</a></li>
        </ol>
    </div>
@endsection

@section('content')
    {{-- <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form action="{{ request()->get('search') }}" method="get">
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
                <div class="col-9">
                    <div class="card-header">
                        <h4 class="card-title">Data Purchase Request</h4>
                    </div>
                </div>
                {{-- <div class="col-3">
                    <div id="button_add">
                        <a href="{{ route('purchase_request.create') }}" class="btn btn-success" id="add"> +Add Data
                        </a>
                    </div>
                </div> --}}


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
                            <td align="left">Nomor PR</td>
                            <td>Deadline Date</td>
                            <td>Requester</td>
                            <td>Divisi</td>
                            <td>Type</td>
                            <td>Status</td>
                            <td align="center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($purchase_requests) == 0)
                            <tr>
                                <td colspan="8" align="center" style="color: gray; background-color: white"> <i>Data
                                        kosong</i> </td>
                            </tr>
                        @endif

                        @foreach ($purchase_requests as $no => $purchase_request)
                            <tr align="right">
                                {{-- <td align="center">
                                    <div class="form-check custom-checkbox ms-2">
                                        <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                        <label class="form-check-label" for="customCheckBox2"></label>
                                    </div>
                                </td> --}}
                                <td class="content-control" align="left">{{ $purchase_request->no_pr }}</td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d F Y') }}</td>
                                <td class="content-control">{{ $purchase_request->requester }}</td>
                                <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                                <td class="content-control">{{ $purchase_request->type }}</td>
                                @if ($purchase_request->accept_status == 'pending')
                                    <td align="center"> <a class="pending content-control">
                                            <i class="fa fa-clock-o"></i> {{ $purchase_request->accept_status }}
                                        </a></td>
                                @elseif ($purchase_request->accept_status == 'accept')
                                    <td align="center"> <a class="approve content-control">
                                            <i class="fa fa-check"></i> {{ $purchase_request->accept_status . 'ed' }}
                                        </a></td>
                                @elseif ($purchase_request->accept_status == 'reject')
                                    <td align="center"> <a class="reject content-control">
                                            <i class="fa fa-close"></i> {{ $purchase_request->accept_status . 'ed' }}
                                        </a></td>
                                @endif
                                <td class="py-2 text-end">
                                    <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp"
                                            type="button" id="order-dropdown-1" data-bs-toggle="dropdown"
                                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                                    viewbox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24">
                                                        </rect>
                                                        <circle fill="#000000" cx="5" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12" r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12" r="2">
                                                        </circle>
                                                    </g>
                                                </svg></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-1">
                                            <div class="py-2">

                                                <a class="dropdown-item" href="/">Accept PR</a>
                                                <a class="dropdown-item" href="/">Accept and Edit PR</a>

                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                                    class="dropdown-item text-danger"
                                                    onClick="reject_create({{ $purchase_request->id }})"> Reject
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="exampleModalPowderCenter">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" align="center" id="PowderModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div id="powder_page" class="pd-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Required vendors -->
        <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

        <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function reject_create(id) {
                $.get("{{ url('approval/accept/create/reject') }}/" + id, {}, function(data, status) {
                    $("#PowderModalLabel").html('Reject Note');
                    $("#powder_page").html(data);
                    $("#exampleModalPowderCenter").modal('show');

                })
            }
        </script>

    @endsection
