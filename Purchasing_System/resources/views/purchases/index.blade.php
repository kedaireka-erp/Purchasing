@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

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

    <div id="table-body">
        <div class="container">
            <table class="table table-borderless" style="background-color:white">
                <thead class="table-head">
                    <tr>
                        <td>Nomor PR</td>
                        <td>Deadline Date</td>
                        <td>Requester</td>
                        <td>Division Name</td>
                        <td>Type</td>
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
                            <td align="left">{{ $purchase_request->no_pr }}</td>
                            <td>{{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d F Y') }}</td>
                            <td>{{ $purchase_request->requester }}</td>
                            <td>{{ $purchase_request->Prefixe->divisi }}</td>
                            <td>{{ $purchase_request->type }}</td>
                            {{-- <td>{{ $purchase_request->project }}</td> --}}
                            {{-- <td>{{ $purchase_request->location->location_name }}</td> --}}
                            <td>{{ $purchase_request->Ship->type }}</td>
                            @if ($purchase_request->approval_status == 'pending')
                                <td> <button class="pending btn btn-warning"> {{ $purchase_request->approval_status }}
                                    </button></td>
                            @elseif ($purchase_request->approval_status == 'approve')
                                <td> <button class="approve btn btn-warning"> {{ $purchase_request->approval_status }}
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
                                {{-- <form method="GET" action="{{ route('purchase_request.plus', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="PLUS" name="_method">
                                    <button type="submit" class="btn btn-warning" id="plus"> <i
                                            class="fa fa-plus"></i>
                                    </button>
                                </form> --}}

                                <form method="GET" action="{{ route('purchase_request.edit', $purchase_request->id) }}"
                                    style="margin-right:10px">
                                    @csrf
                                    <input type="hidden" value="EDIT" name="_method">
                                    <button type="submit" class="btn btn-warning" id="edit"> <i
                                            class="fa fa-edit"></i>
                                    </button>
                                </form>



                                {{-- <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                    action="{{ route('purchase_request.destroy', $purchase_request->id) }}">
                                    @csrf
                                    <input type="hidden" value="DELETE" name="_method">
                                    <button type="submit" class="btn btn-danger" id="delete"> <i
                                            class="bi bi-trash"></i>
                                    </button>
                                </form> --}}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $purchase_requests->links() }}
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>


    @endsection
