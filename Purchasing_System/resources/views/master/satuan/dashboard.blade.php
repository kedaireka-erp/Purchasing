@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Satuan')

@section('Judul-content')
    <div class="title-page">
        Master Satuan
    </div>
@endsection

@section('content')

    <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form action="{{ route('satuan.satuansearch') }}" method="get">
                        <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="{{ request('search') }}">
                    </form>
                </div>
                <div class="col-lg-5 col-md-2"></div>
                <div class="col-lg-2 col-md-4">
                    <div id="button_add">
                        <a href="{{ route('satuan.satuanadd') }}" class="btn btn-success" id="add"> +Add Data
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <x-alert></x-alert>

    </div>
    <div id="table-body">
        <div class="container">
            <table class="table table-borderless" style="background-color:white">
                <thead class="table-head">
                    <tr style="text-align: center">
                        <th width="10%">No</th>
                        <th width="30%">Nama Satuan</th>
                        <th width="20%">Unit</th>
                        <th width="20%">Tanggal Pembuatan</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($satuan) == 0)
                        <tr>
                            <td colspan="6" align="center" style="color: gray; background-color: white"> <i>Data
                                    kosong</i> </td>
                        </tr>
                    @endif


                    @foreach ($satuan as $index => $item)
                        <tr align="center">
                            <td> {{ $index + $satuan->firstItem() }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->unit }} </td>
                            <td> {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }} </td>


                            <td class="d-flex justify-content-center">


                                <form method="GET" action="{{ route('satuan.satuanedit', $item->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning" id="edit"> <i
                                            class="fa fa-edit"></i> </button>
                                </form>



                                <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                    action="{{ route('satuan.satuandelete', $item->id) }}">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <button type="submit" class="btn btn-danger" id="delete"> <i
                                            class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach




            </table>
        </div>
        </tbody>

    </div>

    <div id="pagination" style="margin-top:30px">
        <div class="container">
            <div class="d-flex justify-content-center">
                @if ($satuan->currentPage() != $satuan->lastItem())
                    <a class="btn btn-warning" type="button" href="{{ $satuan->previousPageUrl() }}">
                        < </a>
                            <span class="btn btn-info mr-2 ml-2" type="button">
                                {{ $satuan->currentPage() }}
                            </span>
                            <a class="btn btn-danger" type="button" href="{{ $satuan->nextPageUrl() }}"> >
                            </a>
                @endif
            </div>
        </div>
    </div>


@endsection
