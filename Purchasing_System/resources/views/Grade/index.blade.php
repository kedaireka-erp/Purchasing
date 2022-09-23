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

@section('title_content', 'Master Grade')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Grade</a></li>
        </ol>
    </div>
@endsection

@section('content')

    <div class="card">

        <div id="chead">
            <div class="row">
                <div class="col-9">
                    <div class="card-header">
                        <h4 class="card-title">Data Master Grade</h4>
                    </div>
                </div>
                <div class="col-3">
                    <div id="button_add">
                        <a href="{{ route('grade.create') }}" class="btn btn-success" id="add"> +Add Data
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
                            <td>No.</td>
                            <td>Type</td>
                            <td colspan="2">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grade as $value)
                            <tr>
                                <td class="content-control">{{ $loop->iteration }}</td>
                                <td class="content-control">{{ $value->type }}</td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('grade.edit', $value->id) }}">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('grade.destroy', $value->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <a class="btn btn-primary" href="/grade/download" role="button">Download Data</a>
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
