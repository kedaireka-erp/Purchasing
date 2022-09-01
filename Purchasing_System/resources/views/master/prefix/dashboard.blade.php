@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Prefix')

@section('Judul-content')
    <div class="title-page">
        Master Prefix
    </div>
@endsection

@section('content')

    <div id="tombol">
        <div class="container">

            <div class="d-flex justify-content-between">

                <form action="{{ route('prefix.prefixsearch') }}" class="d-flex justify-content-start" method="get">
                    <input class="form-control mr-2 " name="search" type="search" placeholder="Search" style="width: 300px"
                        value="{{ request('search') }}">
                    <button class="btn btn-success" type="submit" id="search">Search</button>
                </form>

                {{-- <div class="d-flex justify-content-center"> --}}
                <div id="button_add">


                    <a href="{{ route('prefix.prefixadd') }}" class="btn btn-success" id="add"> +Tambah Prefix
                    </a>
                </div>
                {{-- </div> --}}

            </div>

        </div>
    </div>
    @if (session()->has('success'))
        <div id="alert" style="margin-top:20px;margin-bottom:10px">
            <div class="container col-lg-8">
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @elseif (session()->has('teredit'))
        <div id="alert" style="margin-top:20px;margin-bottom:10px">
            <div class="container col-lg-8">
                <div class="alert alert-warning" role="alert">
                    {{ session('teredit') }}
                </div>
            </div>
        </div>
    @elseif (session()->has('terhapus'))
        <div id="alert" style="margin-top:20px;margin-bottom:10px">
            <div class="container col-lg-8">
                <div class="alert alert-danger" role="alert">
                    {{ session('terhapus') }}
                </div>
            </div>
        </div>
    @endif

    </div>
    <div id="table-body">
        <div class="container">
            <table class="table table-borderless" style="background-color:white">
                <thead class="table-head">
                    <tr style="text-align: center">
                        <th width="10%">No</th>
                        <th width="40%">Nama Prefix</th>
                        <th width="30%">Divisi</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($prefix) == 0)
                        <tr>
                            <td colspan="6" align="center" style="color: gray; background-color: white"> <i>Data
                                    kosong</i> </td>
                        </tr>
                    @endif


                    @foreach ($prefix as $index => $item)
                        <tr>
                            <td align="center"> {{ $index + $prefix->firstItem() }} </td>
                            <td> {{ $item->prefix }} </td>
                            <td> {{ $item->divisi }} </td>


                            <td class="d-flex justify-content-center">


                                <form method="GET" action="{{ route('prefix.prefixedit', $item->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning" id="edit"> <i
                                            class="fa fa-edit"></i> </button>
                                </form>



                                <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                    action="{{ route('prefix.prefixdelete', $item->id) }}">
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
            {{ $prefix->onEachSide(5)->links() }}


        </div>
    </div>


@endsection
