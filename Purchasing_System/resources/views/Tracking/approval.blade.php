@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Approval Tracking')

@section('datatable')
    {{-- Style Datatable --}}
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

@endsection


@section('title_content', 'Purchase Request')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tracking</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Approval Tracking</a></li>
        </ol>
    </div>
@endsection

@section('content')


    <div class="row">
        @foreach ($purchase_requests as $purchase_request)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <span>
                                <svg class="me-2" width="10" height="10" viewbox="0 0 10 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @if ($purchase_request->type == 'othergood')
                                        <circle cx="5" cy="5" r="5" fill="green"></circle>
                                    @elseif($purchase_request->type == 'powder')
                                        <circle cx="5" cy="5" r="5" fill="purple"></circle>
                                    @endif
                                </svg>
                                {{ $purchase_request->type }}
                            </span>
                            <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp"
                                    type="button" id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport"
                                    aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                            viewbox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24">
                                                </rect>
                                                <circle fill="#000000" cx="5" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="12" cy="12" r="2">
                                                </circle>
                                                <circle fill="#000000" cx="19" cy="12" r="2">
                                                </circle>
                                            </g>
                                        </svg></span></button>
                                <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-1">
                                    <div class="py-2">

                                        <a class="dropdown-item"
                                            href="{{ route('purchase_request.view', $purchase_request->id) }}">Detail</a>

                                        @if ($purchase_request->approval_status == 'pending' && $purchase_request->accept_status == 'pending')
                                            <a class="dropdown-item"
                                                href="{{ route('purchase_request.edit', $purchase_request->id) }}">Edit</a>
                                            <form action="{{ route('purchase_request.destroy', $purchase_request->id) }}"
                                                method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="font-w600 fs-18"><a href="javascript:void(0);"
                                class="text-black">{{ $purchase_request->no_pr }}</a></p>
                        <div class="progress default-progress my-4">
                            @if ($purchase_request->approval_status == 'pending' && $purchase_request->accept_status == 'pending')
                                <div class="progress-bar bg-danger progress-animated" style="width: 30%; height:10px;"
                                    role="progressbar">
                                @elseif($purchase_request->approval_status == 'edit' && $purchase_request->accept_status == 'pending')
                                    <div class="progress-bar bg-warning progress-animated" style="width: 60%; height:10px;"
                                        role="progressbar">
                                    @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'pending')
                                        <div class="progress-bar bg-warning progress-animated"
                                            style="width: 60%; height:10px;" role="progressbar">
                                        @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'accept')
                                            <div class="progress-bar bg-success progress-animated"
                                                style="width: 100%; height:10px;" role="progressbar">
                                            @elseif($purchase_request->approval_status == 'edit' && $purchase_request->accept_status == 'accept')
                                                <div class="progress-bar bg-success progress-animated"
                                                    style="width: 100%; height:10px;" role="progressbar">
                                                @elseif($purchase_request->approval_status == 'edit' && $purchase_request->accept_status == 'edit')
                                                    <div class="progress-bar bg-success progress-animated"
                                                        style="width: 100%; height:10px;" role="progressbar">
                                                    @elseif($purchase_request->approval_status == 'approve' && $purchase_request->accept_status == 'edit')
                                                        <div class="progress-bar bg-success progress-animated"
                                                            style="width: 100%; height:10px;" role="progressbar">
                                                        @elseif($purchase_request->approval_status == 'reject' || $purchase_request->accept_status == 'reject')
                                                            <div class="progress-bar bg-danger progress-animated"
                                                                style="width: 100%; height:10px;" role="progressbar">
                                                                REJECT
                            @endif
                        </div>

                    </div>

                    <div class="d-flex justify-content-between align-items-center kanban-user">

                        <div class="text">
                            <p>{{ $purchase_request->requester }}</p>
                            <p style="margin-top:-15px">{{ $purchase_request->Prefixe->divisi }}</p>
                        </div>


                        <span><i
                                class="far fa-clock me-2"></i>{{ Carbon\Carbon::parse($purchase_request->deadline_date)->diffForHumans() }}
                        </span>

                    </div>
                </div>
            </div>
    </div>
    @endforeach
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
@endsection
