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

    <div class="card">
        <div id="chead">
            <div class="row">
                <div class="col-9">
                    <div class="card-header">
                        <h4 class="card-title">Data Purchase Order</h4>
                    </div>
                </div>


            </div>
            <hr>
        </div>


        <div class="card-body">
            <div class="table-responsive">

                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr class="content-control-md" align="center">

                            <td width="10%">Nomor PO</td>
                            <td width="15%">Supplier</td>
                            <td width="15%">Alamat Kirim</td>
                            <td width="10%">Pembayaran</td>
                            <td width="15%">Waktu Pengiriman</td>
                            <td width="15%">Status</td>
                            <td width="15%">Tanggal Pembuatan</td>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>




                        @foreach ($orders as $item)
                            <tr align="center">

                                <td class="content-control-md" align="left">{{ $item->no_po }}</td>
                                <td class="content-control-md">{{ $item->nama_supplier }}</td>
                                <td class="content-control-md">{{ $item->location->location_name }}</td>
                                <td class="content-control-md">{{ $item->payment->name_payment }}</td>
                                @if ($item->timeshipping == null)
                                    <td class="content-control-md">
                                        {{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d/m/Y') }}</td>
                                @else
                                    <td class="content-control-md">{{ $item->timeshipping->name_time }}</td>
                                @endif
                                @if ($item->purchases->get(0)->status == 'outstanding')
                                    <td>
                                        <a class="pending content-control-sm">
                                            <i class="fa fa-clock-o"></i> {{ $item->purchases->get(0)->status }}
                                        </a>
                                    </td>
                                @elseif($item->purchases->get(0)->status == 'closed')
                                    <td>
                                        <a class="approve content-control-sm">
                                            <i class="fa fa-check"></i> {{ $item->purchases->get(0)->status }}
                                        </a>
                                    </td>
                                @endif
                                <td class="content-control-md">
                                    {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                </td>
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
                                                    href="{{ route('order.view', $item->id) }}">Detail</a>
                                                <a class="dropdown-item" href="#">Print</a>
                                                <form action="{{ route('order.destroyApp', $item->id) }}" method="POST">
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

    </div>
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>

@endsection
