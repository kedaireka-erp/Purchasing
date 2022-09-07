@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Location')

@section('Judul-content')
    <div class="title-page">
        Master Location
    </div>
@endsection

@section('content')

    <div id="tombol">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-2">
                    <form method="GET">
                        <div class="input-group mb-3">
                            <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="{{ request()->get('search') }}">
                            
                        </div>
                    </form>
                    {{-- <form action="{{ route('satuan.satuansearch') }}" method="get">
                        <input class="form-control fa" name="search" type="search" placeholder="&#xf002      Search "
                            value="{{ request()->get('search') }}">
                    </form> --}}
                </div>
                <div class="col-lg-5 col-md-2"></div>
                <div class="col-lg-2 col-md-4">
                    <div id="button_add">
                        <a href="{{ route('location.create') }}" class="btn btn-success" id="add"> +Add Data
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
                        <th width="40%">Location Name</th>
                        <th width="30%">Address</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($locations) == 0)
                        <tr>
                            <td colspan="6" align="center" style="color: gray; background-color: white"> <i>Data
                                    kosong</i> </td>
                        </tr>
                    @endif


                    @foreach ($locations as $no => $location)
                        <tr>
                            <td align="center"> {{ $no + $locations->firstItem() }} </td>
                            <td> {{ $location->location_name }} </td>
                            <td> {{ $location->address }} </td>


                            <td class="d-flex justify-content-center">


                                <form method="GET" action="{{ route('location.edit', $location->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning" id="edit"> <i
                                            class="fa fa-edit"></i> </button>
                                </form>



                                <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                    action="{{ route('location.destroy', $location->id) }}">
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
                @if ($locations->currentPage() != $locations->lastItem())
                    <a class="btn btn-warning" type="button" href="{{ $locations->previousPageUrl() }}">
                        < </a>
                            <span class="btn btn-info mr-2 ml-2" type="button">
                                {{ $locations->currentPage() }}
                            </span>
                            <a class="btn btn-danger" type="button" href="{{ $locations->nextPageUrl() }}"> >
                            </a>
                @endif
            </div>
        </div>
    </div>


@endsection
