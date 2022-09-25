@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Item')

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

@section('title_content', 'Master Item')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Master Item</a></li>
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
                        <h4 class="card-title">Data Master Item</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <a class="btn btn-primary" href="/masteritem/download" role="button" id="excel"> <i
                            class="fa fa-file-excel-o"></i> Excel </a>
                </div>
                <div class="col-lg-2 col-sm-3">
                    <a onClick="item_create()" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#exampleModalItemonCenter" id="add"> +Add Data</a>
  
                </div>
            </div>
            <hr>

        <x-alert></x-alert>
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
                            <td width="10%">No</td>
                            <td width="30%">Nama Barang</td>
                            <td width="20%">Stok</td>
                            <td width="20%">Tanggal Pembuatan</th>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($items) == 0)
                            <tr>
                                <td colspan="6" align="center" style="color: gray; background-color: white"> <i>Data
                                        kosong</i> </td>
                            </tr>
                        @endif


                        @foreach ($items as $d => $item)
                            <tr align="center">
                                <td class="content-control"> {{ $d + $items->firstitem() }} </td>
                                <td class="content-control"> {{ $item->item_name }} </td>
                                <td class="content-control"> {{ $item->stock }} </td>
                                <td class="content-control"> {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
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
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalItemCenter" class="dropdown-item"
                                                    onClick="item_view({{ $item->id }})">Detail</a>
                                                    {{-- <a
                                                    data-bs-toggle="modal" data-bs-target="#exampleModalItemCenter" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalItemCenter"
                                                    onClick="item_edit({{ $item->id }})">Edit</a> --}}
                                                <form action="{{ route('master_item.midelete', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="dropdown-item text-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                {{-- <td class="d-flex justify-content-center">


                                    <form method="GET" action="{{ route('master_item.miupdate', $item->id) }}"
                                        style="margin-right:10px">
                                        @csrf
                                        <input type="hidden" value="EDIT" name="_method">
                                        <button type="submit" class="btn btn-warning" id="edit"> <i
                                                class="fa fa-edit"></i> </button>
                                    </form>



                                    <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                        action="{{ route('master_item.midelete', $item->id) }}">
                                        @csrf
                                        <input type="hidden" value="DELETE" name="_method">
                                        <button type="submit" class="btn btn-danger" id="delete"> <i
                                                class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    
                                </td> --}}
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
            function item_create() {
                $.get("{{ route('master_item.create') }}", {}, function(data, status) {
                    $("#ItemModalLabel").html('Add Item');
                    $("#item_page").html(data);
                    $("#exampleModalItemCenter").modal('show');
                })
            }
        
            function item_edit(id) {
                $.get("{{ url('masteritem/edit') }}/" + id, {}, function(data, status) {
                    $("#ItemModalLabel").html('Edit Item');
                    $("#item_page").html(data);
                    $("#exampleModalItemCenter").modal('show');
                })
            }
        
            function item_view(id) {
                $.get("{{ url('masteritem/view') }}/" + id, {}, function(data, status) {
                    $("#ItemModalLabel").html('View Item');
                    $("#item_page").html(data);
                    $("#exampleModalItemCenter").modal('show');
                })
            }
        
        </script>

    @endsection
