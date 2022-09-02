@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Kebutuhan')

@section('Judul-content')
    <div class="title-page">
        Master Kebutuhan
    </div>
@endsection

@section('content')
    <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form action="{{ url('ships') }}" method="get">
                        <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="{{ request('search') }}">
                    </form>
                </div>
                <div class="col-lg-5 col-md-2"></div>
                <div class="col-lg-2 col-md-4">
                    <div id="button_add">
                        <a href="{{ url('ships/create') }}" class="btn btn-success" id="add"> +Add Data
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <a class="btn btn-info" href="{{ url('ships/create') }}">NEW</a>
<br><br>
<form get="GET" action="{{ url('ships') }}">
    <input type="text" name="search">
    <button type="submit">search</button>
</form>
<br> --}}
    <div id="table-body">
        <div class="container">
            <table class="table table-borderless" style="background-color:white">
                <thead class="table-head">
                    <tr style="text-align: center">
                        <th width="10%">No</th>
                        <th width="70%">Ship Type</th>
                        <th width="20%" colspan="2">Action</th>
                    </tr>
                </thead>
                @if (count($datas) == 0)
                    <tr>
                        <td colspan="6" align="center" style="color: gray; background-color: white"><i>
                                Data kosong
                            </i></td>
                    </tr>
                @endif
                <tr>
                    @foreach ($datas as $key => $value)
                        <td align="center">{{ $key + $datas->firstitem() }}</td>
                        <td>{{ $value->name }}</td>
                        <td class="d-flex justify-content-center">
                            <form method="GET" action="{{ url('ships/' . $value->id . '/edit') }}"
                                style="margin-right:10px">
                                @csrf
                                <input type="hidden" value="EDIT" name="_method">
                                <button type="submit" class="btn btn-warning" id="edit"> <i class="fa fa-edit"></i>
                                </button>
                            </form>
                            <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                action="{{ url('ships/' . $value->id) }}">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <button type="submit" class="btn btn-danger" id="delete"> <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div id="pagination" style="margin-top:30px">
        <div class="container">
            <div class="d-flex justify-content-center">
                @if ($datas->currentPage() != $datas->lastItem())
                    <a class="btn btn-warning" type="button" href="{{ $datas->previousPageUrl() }}">
                        < </a>
                            <span class="btn btn-info mr-2 ml-2" type="button">
                                {{ $datas->currentPage() }}
                            </span>
                            <a class="btn btn-danger" type="button" href="{{ $datas->nextPageUrl() }}"> >
                            </a>
                @endif
            </div>
        </div>
    </div>
@endsection
