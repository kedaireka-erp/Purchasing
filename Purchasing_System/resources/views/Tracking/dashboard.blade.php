@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Request Tracking')

@section('Judul-content')
    <div class="title-page">
        Request Tracking
    </div>
@endsection

@section('content')
    <div id="tombol">
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

                </div>
            </div>
        </div>
    </div>

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
    </div>
    <div id="table-body">
        <div class="container">
            <table class="table table-borderless" style="background-color:white">
                <thead class="table-head">
                    <tr style="text-align: center">
                        <td>Nomor PR</td>
                        <td>Deadline Date</td>
                        <td>Nama Barang</td>
                        <td>Quantity</td>
                        <td>Unit</td>
                        <td>Outstanding</td>
                        <td>Sudah Datang</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($items as $no => $item)
                        <tr style="text-align: center">
                            <td>{{ $item->purchase->no_pr }}</td>
                            <td>{{ $item->purchase->deadline_date }}</td>
                            @foreach ($items as $no => $it)
                                <td>{{ $it->master_item->item_name }}</td>
                                <td>{{ $it->stok }}</td>
                                <td>{{ $it->satuan->unit }}</td>
                            @endforeach
                            <td>{{ $item->outstanding }}</td>
                            <td>{{ $item->sudah_datang }}</td>
                            {{-- <td>{{ $purchase_request->Ship->type }}</td> --}}

                            <td class="d-flex justify-content-center">

                                <form method="GET" action="{{ route('purchase_request.view', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="VIEW" name="_method">
                                    <button type="submit" class="btn btn-warning" id="view"> <i class="fa fa-eye"></i>
                                    </button>
                                </form>


                                <form method="GET" action="/" style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning" id="edit"> <i
                                            class="fa fa-edit"></i>
                                    </button>
                                </form>



                                <form method="POST" onsubmit="return confirm('Move data to trash?')" action="/">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <button type="submit" class="btn btn-danger" id="delete"> <i
                                            class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            {{-- <td>
                            <a href="{{ route('purchase_request.edit', $purchase_request->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('purchase_request.destroy', $purchase_request->id) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td> --}}
                        </tr>
                    @endforeach


                </tbody>
            </table>

        </div>

    @endsection
