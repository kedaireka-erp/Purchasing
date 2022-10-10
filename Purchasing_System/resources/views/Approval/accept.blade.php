@extends('layout.sidebar')

@section('judul-laman', 'Accept PR')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            Accept PR
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Approval Tim Purchasing</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Accept PR</a></li>
        </ol>
    </div>
@endsection

@section('content')
<x-alert></x-alert>
    <div class="row">
        <div class="col-md-5">
            <div class="card" style="height: 550px">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title"> Approval Tracking </h4>
                </div>
                <div class="card-body">
                    <div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height370">
                        <ul class="timeline">
                            @include('Approval.timeline')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                        class="nav-link active show">Detail Request</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link"> Item </a>
                                </li>
                                @if($purchase_requests->accept_status != 'accept')
                                <li class="nav-item"><a href="#approval" data-bs-toggle="tab" class="nav-link">
                                        Approval </a>
                                </li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="post-input">
                                        <table style="margin-top: -150px">
                                            <tr class="tr">
                                                <td width="200px">No. Purchase Request</td>
                                                <td>: {{ $purchase_requests->no_pr }}</td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="220px">Tanggal Pengajuan</td>
                                                <td>:
                                                    {{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}
                                                </td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                            <td width="200px">Tanggal Deadline</td>
                                            <td>:
                                                {{ \Carbon\Carbon::parse($purchase_requests->deadline_date)->format('d F Y') }}
                                            </td>
                                            </tr>

                                            <tr class="tr">
                                                @if($purchase_requests->accept_status == 'accept')
                                                <td width="200px">Tanggal Disetujui</td>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}
                                                    </td>

                                                    <tr class="tr">
                                                        <td width="200px">Tanggal Diterima PR</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
                                                        </td>
                                                    </tr>
                                                    <tr class="tr">
                                                    <td width="200px">Status</td>
                                                    <td>:
                                                        {{ $purchase_requests->approval_status . ' and '.  $purchase_requests->accept_status }}
                                                    </td>
                                                    </tr>
                                                @elseif ($purchase_requests->approval_status == 'approve')
                                                    <td width="200px">Tanggal Disetujui</td>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}
                                                    </td>
                                                    <tr class="tr">
                                                    <td width="200px">Status</td>
                                                    <td>:
                                                        {{ $purchase_requests->approval_status . 'd by Manager' }}
                                                    </td>
                                                    </tr>
                                                @elseif ($purchase_requests->approval_status == 'reject')
                                                    <td width="200px">Tanggal Ditolak</td>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}
                                                    </td>
                                                    <td width="200px">Status</td>
                                                    <tr class="tr">
                                                    <td>:
                                                        {{ $purchase_requests->approval_status . 'ed by Manager' }}
                                                    </td>
                                                    </tr>
                                                @endif
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Requester</td>
                                                <td>: {{ $purchase_requests->requester }}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Divisi</td>
                                                <td>: {{ $purchase_requests->Prefixe->divisi }}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Project/Customer</td>
                                                <td>: {{ $purchase_requests->project }} </td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Kebutuhan/Pengiriman</td>
                                                <td>: {{ $purchase_requests->ship->tipe }} </td>
                                            </tr>
                                            <br>

                                            <tr class="tr">
                                                <td width="200px">Alamat</td>
                                                <td>: {{ $purchase_requests->location->location_name }}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Approval PR</td>
                                                <td>: {{ $purchase_requests->approval_status }}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Note</td>

                                                <td>: </td>
                                            </tr>
                                            <br>


                                        </table>
                                        <p> {!! $purchase_requests->note !!} </p>
                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me">

                                        {{-- ini tabel item di tracking --}}
                                        @if ($purchase_requests->type == 'othergood')
                                            <table class="table table-striped" id="body">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <td scope="col">No.</td>
                                                        <td scope="col">Description of Goods</td>
                                                        <td scope="col">Quantity</td>
                                                        <td scope="col">Unit</td>
                                                    </tr>
                                                </thead>

                                                @php
                                                    $nomor = 1;
                                                @endphp


                                                <tbody>

                                                    @foreach ($purchase_requests->item as $yes)
                                                        <tr style="text-align: center">
                                                            <td>{{ $nomor++ }}</td>
                                                            <td>{{ $yes->master_item->item_name }}</td>
                                                            <td>{{ $yes->stok }}</td>
                                                            <td>{{ $yes->satuan->unit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif ($purchase_requests->type == 'powder')
                                            <table class="table table-striped" id="body">
                                                <thead>
                                                    <tr style="text-align: center; font-weight: bold">
                                                        <td class="content-control-md">No.</td>
                                                        <td class="content-control-md">Suppllier</td>
                                                        <td class="content-control-md">Grade</td>
                                                        <td class="content-control-md">Warna</td>
                                                        <td class="content-control-md">Kode Warna</td>
                                                        <td class="content-control-md">Finish</td>
                                                        <td class="content-control-md">Quantity</td>
                                                        <td class="content-control-md">m2</td>

                                                    </tr>
                                                </thead>
                                                @php
                                                    $nomor = 1;
                                                @endphp

                                                {{-- @if ($item->id_request == $purchase_requests->id) --}}
                                                <tbody>

                                                    @foreach ($purchase_requests->powder as $yes)
                                                    <tr style="text-align: center">
                                                        <td class="content-control-sm">{{ $nomor++ }}</td>
                                                        <td class="content-control-sm">{{ $yes->supplier->vendor }}</td>
                                                        <td class="content-control-sm">{{ $yes->grade->tipe }}</td>
                                                        <td class="content-control-sm">{{ $yes->warna }}</td>
                                                        <td class="content-control-sm">{{ $yes->colour->name }}</td>
                                                        <td class="content-control-sm">{{ $yes->finish }}</td>
                                                        <td class="content-control-sm">{{ $yes->quantity }}</td>
                                                        <td class="content-control-sm">{{ $yes->m2 }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                {{-- @endif --}}
                                            </table>
                                        @endif

                                    </div>
                                </div>


                                <div id="approval" class="tab-pane fade">
                                    <div class="mb-3">
                                        <form action="{{ route('approval.update_accept', $purchase_requests->id) }}"
                                            method="post">
    
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="status" style="margin-top:30px">
                                                        @if($purchase_requests->accept_status == 'pending')
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                            id="approval_status" name="accept_status">
                                                            <option value="{{ $purchase_requests->accept_status }}" selected
                                                                disabled>
                                                                {{ $purchase_requests->accept_status }}</option>
                                                            <option value="accept">accept</option>
                                                        </select>
                                                        @elseif($purchase_requests->accept_status == 'reject')
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                            id="approval_status" name="accept_status">
                                                            <option value="accept" selected
                                                                disabled> reject</option>
                                                            <option value="pending">pending</option>
                                                            <option value="accept">accept</option>
                                                        </select>
                                                        @elseif($purchase_requests->accept_status == 'edit' || $purchase_requests->accept_status == 'accept')
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                            id="approval_status" name="accept_status">
                                                            <option value="accept" selected
                                                                disabled> accept</option>
                                                            <option value="pending">pending</option>
                                                        </select>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button style="margin-top:10px" class="btn btn-primary"> Simpan
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="mb-3">
                                        @if($purchase_requests->accept_status != 'reject')
                                        <div class="mb-3">
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                            class="dropdown-item text-danger"
                                            onClick="reject_create({{ $purchase_requests->id }})"> Reject PR
                                        </button>
                                        @else
                                        <div class="mb-3">
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                                            class="dropdown-item text-danger"
                                            onClick="reject_create({{ $purchase_requests->id }})"> Ubah Pesan Reject
                                        </button>
                                        @endif
                                    </div>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalPowderCenter">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" align="center" id="PowderModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <div id="powder_page" class="pd-2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function reject_create(id) {
            $.get("{{ url('approval/accept/create/reject') }}/" + id, {}, function(data, status) {
                $("#PowderModalLabel").html('Reject Note');
                $("#powder_page").html(data);
                $("#exampleModalPowderCenter").modal('show');

            })
        }
    </script>
@endsection