@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Kebutuhan')

@section('Judul-content')
    <div class="title-page">
        Master Kebutuhan
    </div>
@endsection

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

@section('title_content', 'Master Kebutuhan')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Kebutuhan</a></li>
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
                <div class="col-lg-8 col-sm-6">
                    <div class="card-header">
                        <h4 class="card-title">Data Master Kebutuhan/Pengiriman</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <a class="btn btn-primary" href="/ships/download" role="button" id="excel"> <i
                            class="fa fa-file-excel-o"></i> Excel </a>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <a href="{{ url('ships/create') }}" class="btn btn-success" id="add"> +Add Data
                    </a>
                    {{-- <a onClick="grade_create()" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModalGradeCenter" id="add"> +Add Data</a> --}}
                </div>
            </div>
            <hr>
            <x-alert></x-alert>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example3" class="display" style="width:100%">
                        <thead>
                            <tr align="center">
                                <td width="10%">No</td>
                                <td width="50%">Kebutuhan/ Pengiriman</td>
                                <td width="30%">Tanggal Pembuatan</td>
                                <td width="10%" colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $key => $value)
                                <tr align="center">
                                    <td class="content-control">{{ $key + $datas->firstitem() }}</td>
                                    <td class="content-control">{{ $value->type }}</td>
                                    <td class="content-control">
                                        {{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }} </td>
                                    <td class="d-flex justify-content-center">
                                        <form method="GET" action="{{ url('ships/' . $value->id . '/edit') }}"
                                            style="margin-right:10px">
                                            @csrf
                                            <input type="hidden" value="EDIT" name="_method">
                                            <button type="submit" class="btn btn-warning" id="edit"> <i
                                                    class="fa fa-edit"></i>
                                            </button>
                                        </form>
                                        <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                            action="{{ url('ships/' . $value->id) }}">
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
                    </table>
                </div>
            </div>

            <div class="modal fade" id="exampleModalItemCenter">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" align="center" id="ItemModalLabel"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="item_page" class="pd-2"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Required vendors -->
            <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

            <script>
                function ship_create() {
                    $.get("{{ route('master_item.create') }}", {}, function(data, status) {
                        $("#ItemModalLabel").html('Add Item');
                        $("#item_page").html(data);
                        $("#exampleModalItemCenter").modal('show');
                    })
                }

                function ship_edit(id) {
                    $.get("{{ url('masteritem/edit') }}/" + id, {}, function(data, status) {
                        $("#ItemModalLabel").html('Edit Item');
                        $("#item_page").html(data);
                        $("#exampleModalItemCenter").modal('show');
                    })
                }

                function ship_view(id) {
                    $.get("{{ url('masteritem/view') }}/" + id, {}, function(data, status) {
                        $("#ItemModalLabel").html('View Item');
                        $("#item_page").html(data);
                        $("#exampleModalItemCenter").modal('show');
                    })
                }
            </script>


        @endsection
