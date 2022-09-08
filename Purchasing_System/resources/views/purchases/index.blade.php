@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Prefix')

@section('Judul-content')
    <div class="title-page">
        Purchase Request
    </div>
@endsection

@section('content')
    <div id="tombol">
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
                    <div id="button_add">
                        <a href="{{ route('purchase_request.create') }}" class="btn btn-success" id="add"> +Add Data
                        </a>
                    </div>

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
                        <td>Requester</td>
                        <td>Division Name</td>
                        <td>Project</td>
                        {{-- <td>Lokasi</td> --}}
                        <td>Pengiriman</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @if (count($purchase_requests) == 0)
                        <tr>
                            <td colspan="8" align="center" style="color: gray; background-color: white"> <i>Data
                                    kosong</i> </td>
                        </tr>
                    @endif

                    @foreach ($purchase_requests as $no => $purchase_request)
                        <tr style="text-align: center">
                            <td>{{ $purchase_request->no_pr }}</td>
                            <td>{{ $purchase_request->deadline_date }}</td>
                            <td>{{ $purchase_request->requester }}</td>
                            <td>{{ $purchase_request->Prefixe->divisi }}</td>
                            <td>{{ $purchase_request->project }}</td>
                            {{-- <td>{{ $purchase_request->location->location_name }}</td> --}}
                            <td>{{ $purchase_request->Ship->type }}</td>
                            @if ($purchase_request->approval_status == 'pending')
                                <td> <button class="pending btn btn-warning"> {{ $purchase_request->approval_status }}
                                    </button></td>
                            @endif

                            <td class="d-flex justify-content-center">
                                <form method="GET" action="{{ route('purchase_request.view', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="VIEW" name="_method">
                                    <button type="submit" class="btn btn-warning" id="view"> <i class="fa fa-eye"></i>
                                    </button>
                                </form>
                                <form method="GET" action="{{ route('purchase_request.view', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="VIEW" name="_method">
                                    <button type="submit" class="btn btn-warning" id="plus"> <i
                                            class="fa fa-plus"></i>
                                    </button>
                                </form>

                                <form method="GET" action="{{ route('purchase_request.edit', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning" id="edit"> <i
                                            class="fa fa-edit"></i>
                                    </button>
                                </form>



                                <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                    action="{{ route('purchase_request.destroy', $purchase_request->id) }}">
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
            {{ $purchase_requests->links() }}
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                                                                                                                                        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                                                                                                                                    </script>
                                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                                                                                                                                        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                                                                                                                                    </script>
                                                                                                                                                    -->

    @endsection
