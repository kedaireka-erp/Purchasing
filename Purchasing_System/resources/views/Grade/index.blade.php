@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Grade')

@section('datatable')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection

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
                <div class="col-lg-8 col-md-6 col-xs-2">
                    <div class="card-header">
                        <h4 class="card-title">Data Master Grade</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-xs-3">
                    <a class="btn btn-primary" href="/grade/download" role="button" id="excel"> <i
                            class="fa fa-file-excel-o"></i> Excel </a>
                </div>
                <div class="col-lg-2 col-md-3 col-xs-3">
                    <a onClick="grade_create()" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModalGradeCenter" id="add"> +Add Data</a>
                </div>
            </div>
            <hr>

            <x-alert></x-alert>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="width:100%">
                        <thead>
                            <tr align="center">
                                <td width="10%"> No.</td>
                                <td width="30%"> Tipe Grade </td>
                                <td width="20%"> Grade Powder </td>
                                <td width="35%"> Tanggal Pembuatan </td>
                                <td width="5%"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grade as $value)
                                <tr align="center">
                                    <td class="content-control">{{ $loop->iteration }}</td>
                                    <td class="content-control">{{ $value->tipe }}</td>
                                    <td class="content-control">{{ $value->grade_powder }}</td>
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
                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModalGradeCenter"
                                                        class="dropdown-item"
                                                        onClick="grade_view({{ $value->id }})">Detail</a><a
                                                        data-bs-toggle="modal" data-bs-target="#exampleModalGradeCenter"
                                                        class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalGradeCenter"
                                                        onClick="grade_edit({{ $value->id }})">Edit</a>
                                                    <form action="{{ route('grade.destroy', $value->id) }}" method="POST">
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


            <!-- Modal -->
            <div class="modal fade" id="exampleModalGradeCenter">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" align="center" id="GradeModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="grade_page" class="pd-2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Required vendors -->
            <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
            <script>
                function grade_create() {
                    $.get("{{ route('grade.create') }}", {}, function(data, status) {
                        $("#GradeModalLabel").html('Add Grade');
                        $("#grade_page").html(data);
                        $("#exampleModalGradeCenter").modal('show');
                    })
                }

                function grade_edit(id) {
                    $.get("{{ url('grade/edit') }}/" + id, {}, function(data, status) {
                        $("#GradeModalLabel").html('Edit Grade');
                        $("#grade_page").html(data);
                        $("#exampleModalGradeCenter").modal('show');
                    })
                }

                function grade_view(id) {
                    $.get("{{ url('grade/view') }}/" + id, {}, function(data, status) {
                        $("#GradeModalLabel").html('View Grade');
                        $("#grade_page").html(data);
                        $("#exampleModalGradeCenter").modal('show');
                    })
                }
            </script>

            <script>
                function grade_create() {
                    $.get("{{ route('grade.create') }}", {}, function(data, status) {
                        $("#GradeModalLabel").html('Add Grade');
                        $("#grade_page").html(data);
                        $("#exampleModalGradeCenter").modal('show');
                    })
                }

                function grade_edit(id) {
                    $.get("{{ url('grade/edit') }}/" + id, {}, function(data, status) {
                        $("#GradeModalLabel").html('Edit Grade');
                        $("#grade_page").html(data);
                        $("#exampleModalGradeCenter").modal('show');
                    })
                }

                function grade_view(id) {
                    $.get("{{ url('grade/view') }}/" + id, {}, function(data, status) {
                        $("#GradeModalLabel").html('View Grade');
                        $("#grade_page").html(data);
                        $("#exampleModalGradeCenter").modal('show');
                    })
                }
            </script>
        @endsection
