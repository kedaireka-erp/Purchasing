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
                    <div class="col-3">
                        <div id="button_add">
                            <a href="{{ route('purchase_request.create') }}" class="btn btn-success" id="add"> +Add Data
                            </a>
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
                        <td align="left">Nomor PR</td>
                        <td>Deadline Date</td>
                        <td>Nama Barang</td>
                        <td>Quantity</td>
                        <td>Unit</td>
                        <td>Outstanding</td>
                        <td>Sudah Datang</td>
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

                    @foreach ($purchase_requests as $no => $item)
                        <tr align="right">
                            {{-- <td align="center">
                                <div class="form-check custom-checkbox ms-2">
                                    <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                    <label class="form-check-label" for="customCheckBox2"></label>
                                </div>
                            </td> --}}
                            <td class="content-control" align="left">{{ $item->no_pr }}</td>
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
                                <td>
                                    @foreach ($item->item as $no => $it)
                                        <ul>{{ $it->satuan->unit }}</ul>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->item as $no => $it)
                                        <ul>{{ $it->outstanding }}</ul>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($item->item as $no => $it)
                                        <ul>{{ $it->sudah_datang }}</ul>
                                    @endforeach
                                </td>
                                @if ($item->status == 'outstanding')
                                    <td> <button class="pending btn btn-warning"> {{ $item->status }}
                                        </button></td>
                                @elseif ($item->status == 'closed')
                                    <td> <button class="approve btn btn-warning"> {{ $item->status }}
                                        </button></td>
                                @endif
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
                            {{-- <td class="content-control">{{ $purchase_request->requester }}</td>
                            <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                            <td class="content-control">{{ $purchase_request->type }}</td>
                            @if ($purchase_request->approval_status == 'pending')
                                <td> <a class="pending content-control">
                                        {{ $purchase_request->approval_status }}
                                    </a></td>
                            @elseif ($purchase_request->approval_status == 'approve')
                                <td> <button class="approve btn btn-warning">
                                        {{ $purchase_request->approval_status }}
                                    </button></td>
                            @endif


                            <td class="d-flex justify-content-center">

                                <form method="GET"
                                    action="{{ route('purchase_request.view', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="VIEW" name="_method">
                                    <button type="submit" class="btn btn-warning" id="view"> <i
                                            class="fa fa-eye"></i>
                                    </button>
                                </form>
                                {{-- <form method="GET" action="{{ route('purchase_request.plus', $purchase_request->id) }}"
                                style="margin-right:10px">
                                @csrf
                                <input type="hidden" value="PLUS" name="_method">
                                <button type="submit" class="btn btn-warning" id="plus"> <i
                                        class="fa fa-plus"></i>
                                </button>
                            </form> --}}

                                {{-- <form method="GET"
                                    action="{{ route('purchase_request.edit', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning" id="edit"> <i
                                            class="fa fa-edit"></i>
                                    </button>
                                </form> --}}



                                {{-- <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                action="{{ route('purchase_request.destroy', $purchase_request->id) }}">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <button type="submit" class="btn btn-danger" id="delete"> <i
                                        class="bi bi-trash"></i>
                                </button>
                            </form> --}}
                            {{-- </td>

                        </tr> --}}
                    {{-- @endforeach  --}}
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
