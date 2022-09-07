@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Item')

@section('Judul-content')
    <div class="title-page">
        Master Item
    </div>
@endsection

@section('content')

    <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form action="{{ url ('masteritem/search') }}" method="get">
                        <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="{{ request('search') }}">
                    </form>
                </div>
                <div class="col-lg-5 col-md-2"></div>
                <div class="col-lg-2 col-md-4">
                    <div id="button_add">
                        <a href="{{url ('masteritem/create') }}" class="btn btn-success" id="add"> +Add Data
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
                        <th width="40%">Nama Satuan</th>
                        <th width="30%">Unit</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($items) == 0)
                        <tr>
                            <td colspan="6" align="center" style="color: gray; background-color: white"> <i>Data
                                    kosong</i> </td>
                        </tr>
                    @endif


                    @foreach ($items as $d=>$item)
                        <tr>
                            <td align="center"> {{ $d+$items->firstitem() }} </td>
                            <td> {{ $item->item_name }} </td>
                            <td> {{ $item->stock }} </td>


                            <td class="d-flex justify-content-center">


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
                @if ($items->currentPage() != $items->lastItem())
                    <a class="btn btn-warning" type="button" href="{{ $items->previousPageUrl() }}">
                        < </a>
                            <span class="btn btn-info mr-2 ml-2" type="button">
                                {{ $items->currentPage() }}
                            </span>
                            <a class="btn btn-danger" type="button" href="{{ $items->nextPageUrl() }}"> >
                            </a>
                @endif
            </div>
        </div>
    </div>


@endsection
