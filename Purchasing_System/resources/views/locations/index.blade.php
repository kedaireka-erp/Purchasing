@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Lokasi')

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

@section('title_content', 'Master Lokasi')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Lokasi</a></li>
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
                        <h4 class="card-title">Data Master Lokasi</h4>
                    </div>
                </div>
                <div class="col-3">
                    <div id="button_add">
                        <a href="{{ route('location.create') }}" class="btn btn-success" id="add"> +Add Data
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
                        <tr align="center">
                            {{-- <td align="center">
                                <div class="form-check custom-checkbox ms-2">
                                    <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </td> --}}
                        <tr style="text-align: center">
                            <td width="5%">No</td>
                            <td width="15%">Location Name</td>
                            <td width="45%">Address</td>
                            <td width="20%">Tanggal Pembuatan</td>
                            <td width="15%">Action</td>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($locations) == 0)
                            <tr>
                                <td colspan="6" align="center" style="color: gray; background-color: white"> <i>Data
                                        kosong</i> </td>
                            </tr>
                        @endif


                        @foreach ($locations as $no => $location)
                            <tr align="center">
                                <td class="content-control"> {{ $no + $locations->firstItem() }} </td>
                                <td class="content-control"> {{ $location->location_name }} </td>
                                <td class="content-control" align="justify"> {{ $location->address }} </td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($location->created_at)->format('d F Y') }} </td>


                                <td class="d-flex justify-content-center">


                                    <form method="GET" action="{{ route('location.edit', $location->id) }}"
                                        style="margin-right:10px">
                                        @csrf
                                        <input type="hidden" value="EDIT" name="_method">
                                        <button type="submit" class="btn btn-warning" id="edit"> <i
                                                class="fa fa-edit"></i> </button>
                                    </form>



                                    <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                        action="{{ route('location.destroy', $location->id) }}">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button type="submit" class="btn btn-danger" id="delete"> <i
                                                class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <a class="btn btn-primary" href="/location/download" 
		role="button">Download Data</a>
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
