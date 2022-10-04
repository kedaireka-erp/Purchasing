@extends('layout.sidebar')

@section('judul-laman', 'Request Tracking Powder')

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
            <li class="breadcrumb-item"><a href="javascript:void(0)">Powder</a></li>

        </ol>
    </div>
@endsection
@section('content')

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
                        <tr class="content-control" align="center">
                            <td> Nomor PO </td>
                            <td> Nomor PR </td>
                            <td>Deadline Date</td>
                            <td>Warna</td>
                            <td>Outstanding</td>
                            <td>Sudah Datang</td>
                            <td>Requester</td>
                            <td>Divisi</td>
                            <td>status</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Ubah --}}
                        @foreach ($powders as $no => $item)
                            <tr align="center">
                                <td class="content-control-sm" align="center">{{ $item->no_po }}</td>
                                <td class="content-control-sm" align="center">{{ $item->no_pr }}</td>
                                <td class="content-control-sm" align="center">
                                    {{ \Carbon\Carbon::parse($item->deadline_date)->format('d/m/Y') }}</td>
                                <td class="content-control-sm" align="center">{{ $item->name }}</td>
                                <td class="content-control-sm" align="center">{{ $item->outstanding }}</td>
                                <td class="content-control-sm" align="center">{{ $item->sudah_datang }}</td>
                                <td class="content-control-sm" align="center">{{ $item->requester }}</td>
                                <td class="content-control-sm" align="center">{{ $item->divisi }}</td>
                                @if ($item->status == 'outstanding')
                                    <td>
                                        <a class="pending content-control-sm">
                                            <i class="fa fa-clock-o"></i> {{ $item->status }}
                                        </a>
                                    </td>
                                @elseif($item->status == 'closed')
                                    <td>
                                        <a class="approve content-control-sm">
                                            <i class="fa fa-check"></i> {{ $item->status }}
                                        </a>
                                    </td>
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
                                                <a class="dropdown-item"
                                                    href="{{ route('tracking.detail_powders', $item->id) }}">Tinjau</a>
                                                <form action="/" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
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

        <!-- Datatable -->
        <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>


    @endsection
