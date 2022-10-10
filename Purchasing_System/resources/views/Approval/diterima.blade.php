@extends('layout.sidebar')

@section('judul-laman', 'Approval Tim Purchasing')

@section('datatable')
    {{-- Style Datatable --}}
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endsection

@section('title_content', 'Approval Tim Purchasing')

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Approval</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Purchasing Tim</a></li>
        </ol>
    </div>
@endsection

@section('content')
<x-alert></x-alert>
    <div class="card">
        <div id="chead">
            <div class="row">
                <div class="col-9">
                    <div class="card-header">
                        <h4 class="card-title">Data PR Masuk</h4>
                    </div>
                </div>

            </div>
            <hr>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <br>
                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr class="content-control-md" align="right">
                            <td width="15%" align="left">Nomor PR</td>
                            <td width="10%">Pengajuan</td>
                            <td width="15%">Deadline</td>
                            <td width="15%">Requester</td>
                            <td width="12%">Divisi</td>
                            <td width="13%">Type</td>
                            <td width="15%" align="center">Status</td>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase_requests_pending as $no => $purchase_request)
                            <tr align="right">
                                <td class="content-control" align="left">{{ $purchase_request->no_pr }}</td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($purchase_request->created_at)->format('d/m/Y') }}</td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d/m/Y') }}</td>
                                <td class="content-control">{{ $purchase_request->requester }}</td>
                                <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                                <td class="content-control">{{ $purchase_request->type }}</td>


                                <td align="center"> <a class="pending content-control">
                                        <i class="fa fa-clock-o"></i> {{ $purchase_request->accept_status }}
                                    </a></td>


                                <td class="py-2 text-end">
                                    <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp"
                                            type="button" id="order-dropdown-1" data-bs-toggle="dropdown"
                                            data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg
                                                    xmlns="http://www.w3.org/2000/svg"
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
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-1">
                                            <div class="py-2">

                                                <form
                                                    action="{{ route('approval.purchasing_view', $purchase_request->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="submit" class="dropdown-item" value="Ubah Status">
                                                </form>
                                                <form
                                                    action="{{ route('approval.purchasing_edit', $purchase_request->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="submit" class="dropdown-item" value="Edit PR">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card" style="margin-top: 80px">
        <div id="chead">
            <div class="row">
                <div class="col-9">
                    <div class="card-header">
                        <h4 class="card-title">Data PR Diterima</h4>
                    </div>
                </div>

            </div>
            <hr>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr class="content-control-md" align="right">
                            <td width="15%" align="left">Nomor PR</td>
                            <td width="15%">Diterima</td>
                            <td width="10%">Deadline</td>
                            <td width="15%">Requester</td>
                            <td width="12%">Divisi</td>
                            <td width="13%">Type</td>
                            <td width="15%" align="center">Status</td>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase_requests_approve as $no => $purchase_request)
                            <tr align="right">
                                <td class="content-control" align="left">{{ $purchase_request->no_pr }}
                                </td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($purchase_request->created_at)->format('d/m/Y') }}
                                </td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d/m/Y') }}
                                </td>
                                <td class="content-control">{{ $purchase_request->requester }}</td>
                                <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                                <td class="content-control">{{ $purchase_request->type }}</td>


                                @if ($purchase_request->accept_status == 'edit')
                                    <td align="center"> <a class="edit content-control">
                                            <i class="fa fa-check"></i>
                                            accept with {{ $purchase_request->accept_status . 'ed' }}
                                        </a></td>
                                @elseif ($purchase_request->accept_status == 'accept')
                                    <td align="center"> <a class="approve content-control">
                                            <i class="fa fa-check"></i>
                                            {{ $purchase_request->accept_status . 'd' }}
                                        </a></td>
                                @endif

                                <td class="py-2 text-end">
                                    <div class="dropdown text-sans-serif"><button
                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                            id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                    height="18px" viewbox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24">
                                                        </rect>
                                                        <circle fill="#000000" cx="5" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12"
                                                            r="2">
                                                        </circle>
                                                    </g>
                                                </svg></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-1">
                                            <div class="py-2">
                                                <form
                                                    action="{{ route('approval.purchasing_view', $purchase_request->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="submit" class="dropdown-item" value="View Detail">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card" style="margin-top: 80px">
        <div id="chead">
            <div class="row">
                <div class="col-9">
                    <div class="card-header">
                        <h4 class="card-title">Data PR Reject</h4>
                    </div>
                </div>

            </div>
            <hr>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="width:100%">
                    <thead>
                        <tr class="content-control-md" align="right">
                            <td width="15%" align="left">Nomor PR</td>
                            <td width="15%">Tanggal Reject</td>
                            <td width="10%">Deadline</td>
                            <td width="15%">Requester</td>
                            <td width="12%">Divisi</td>
                            <td width="13%">Type</td>
                            <td width="15%" align="center">Status</td>
                            <td width="5%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($purchase_request_reject as $no => $purchase_request)
                            <tr align="right">
                                <td class="content-control" align="left">{{ $purchase_request->no_pr }}
                                </td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($purchase_request->created_at)->format('d/m/Y') }}
                                </td>
                                <td class="content-control">
                                    {{ \Carbon\Carbon::parse($purchase_request->deadline_date)->format('d/m/Y') }}
                                </td>
                                <td class="content-control">{{ $purchase_request->requester }}</td>
                                <td class="content-control">{{ $purchase_request->Prefixe->divisi }}</td>
                                <td class="content-control">{{ $purchase_request->type }}</td>

                                <td align="center"> <a class="reject content-control">
                                        <i class="fa fa-close"></i>
                                        {{ $purchase_request->accept_status . 'ed' }}
                                    </a></td>

                                <td class="py-2 text-end">
                                    <div class="dropdown text-sans-serif"><button
                                            class="btn btn-primary tp-btn-light sharp" type="button"
                                            id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport"
                                            aria-haspopup="true" aria-expanded="false"><span><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                    height="18px" viewbox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24">
                                                        </rect>
                                                        <circle fill="#000000" cx="5" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="12" cy="12"
                                                            r="2">
                                                        </circle>
                                                        <circle fill="#000000" cx="19" cy="12"
                                                            r="2">
                                                        </circle>
                                                    </g>
                                                </svg></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0"
                                            aria-labelledby="order-dropdown-1">
                                            <div class="py-2">
                                                <form
                                                    action="{{ route('approval.purchasing_view', $purchase_request->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="submit" class="dropdown-item" value="Ubah Status">
                                                </form>
                                                <form
                                                    action="{{ route('approval.purchasing_edit', $purchase_request->id) }}"
                                                    method="GET">
                                                    @csrf
                                                    @method('GET')
                                                    <input type="submit" class="dropdown-item" value="Edit PR">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    

    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

    
    <!-- Datatable -->
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>


    

@endsection
