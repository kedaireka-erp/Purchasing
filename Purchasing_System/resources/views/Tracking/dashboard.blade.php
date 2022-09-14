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
            <table class="table table-border" style="background-color:white">
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
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($purchase_requests as $no => $item)
                        <tr>
                            <td>{{ $item->no_pr }}</td>
                            <td>{{ $item->deadline_date }}</td>
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


                </tbody>
            </table>

        </div>

    @endsection
