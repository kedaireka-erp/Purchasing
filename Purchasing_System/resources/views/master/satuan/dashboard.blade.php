@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Satuan')

@section('Judul-content')
    <div class="title-page">
        Master Satuan
    </div>
@endsection

@section('content')
    <div class="container col-lg-8" style="margin-top: 50px">

        <form action="{{ route('satuan.satuansearch') }}" class="d-flex justify-content-end" method="get">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" style="width: 300px"
                value="{{ request('search') }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
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
    <div id="table-body" style="margin-top: 20px">
        <div class="container col-lg-8">
            <table class="table table-bordered align-middle" style="background-color:white">
                <thead class="table table-primary">
                    <tr style="text-align: center">
                        <th width="10%">#</th>
                        <th width="40%">Nama Satuan</th>
                        <th width="30%">Unit</th>
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
                        <tr>
                            <td align="center"> {{ $index + $satuan->firstItem() }} </td>
                            <td> {{ $item->name }} </td>
                            <td> {{ $item->unit }} </td>


                            <td class="d-flex justify-content-center">


                                <form method="GET" action="{{ route('satuan.satuanedit', $item->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning"> <i class="fa fa-edit"></i> </button>
                                </form>



                                <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                    action="{{ route('satuan.satuandelete', $item->id) }}">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-remove"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach




            </table>
        </div>
        </tbody>
        <div class="d-flex justify-content-center">
            <div id="button-add">
                <a href="{{ route('satuan.satuanadd') }}" class="btn btn-success"style="width:400px"> +Tambah Satuan
                </a>
            </div>
        </div>
    </div>

    <div id="pagination" style="margin-top:30px">
        <div class="container col-lg-8">

            {{ $satuan->links() }}

        </div>
    </div>


@endsection
