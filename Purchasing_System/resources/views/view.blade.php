@extends('layout.sidebar')

@section('judul-laman', 'View PR')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            View PR
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Purchase Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Request Detail</a></li>
        </ol>
    </div>
@endsection

@section('content')

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
                                {{-- <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                            class="nav-link"> Update Form </a>
                                    </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="post-input">
                                            <table style="margin-top: -120px">
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
                                                    @if ($purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'accept'||$purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'edit' || $purchase_requests->approval_status == 'edit' && $purchase_requests->accept_status == 'accept' || $purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'edit' || $purchase_requests->approval_status == 'edit' && $purchase_requests->accept_status == 'edit')
                                                        <td width="200px">Tanggal Disetujui Manager</td>
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
                                                            {{ $purchase_requests->approval_status . 'd and ' . $purchase_requests->accept_status  }}
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
                                                            {{ $purchase_requests->approval_status . 'ed by Manager' }}
                                                        </td>
                                                        </tr>
                                                        @elseif ($purchase_requests->approval_status == 'edit')
                                                        <td width="200px">Tanggal Disetujui</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}
                                                        </td>
                                                        <tr class="tr">
                                                        <td width="200px">Status</td>
                                                        <td>:
                                                            {{ $purchase_requests->approval_status . 'ed by Manager' }}
                                                        </td>
                                                        </tr>
                                                    @elseif ($purchase_requests->approval_status == 'reject')
                                                        <td width="200px">Tanggal Ditolak</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}
                                                        </td>
                                                        <tr class="tr">
                                                        <td width="200px">Status</td>
                                                        <td>:
                                                            {{ $purchase_requests->approval_status . 'ed by Manager' }}
                                                        </td>
                                                        </tr>
                                                        @elseif ($purchase_requests->accept_status == 'reject')
                                                        <td width="200px">Tanggal Ditolak</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
                                                        </td>
                                                        <tr class="tr">
                                                        <td width="200px">Status</td>
                                                        <td>:
                                                            {{ $purchase_requests->accpet_status . 'ed by Tim Purchasing' }}
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
                                                @if($purchase_requests->approval_status == 'reject')
                                            <tr class="tr">
                                                <td width="200px">Pesan Reject</td>
                                                <td style="font-weight: 600">: {{ $purchase_requests->feedback_manager }}</td>
                                            </tr>
                                            <br>
                                            @endif
                                            
                                                <tr class="tr">
                                                    <td width="200px">Note</td>

                                                    <td>: </td>
                                                </tr>
                                                <br>


                                            </table>
                                            <p> {!! $purchase_requests->note !!} </p>
                                        </div>
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
                                                    <td class="content-control-md">No.</td>
                                                    <td class="content-control-md">Suppllier</td>
                                                    <td class="content-control-md">Grade</td>
                                                    <td class="content-control-md">Warna</td>
                                                    <td class="content-control-md">Kode Warna</td>
                                                    <td class="content-control-md">Finish</td>
                                                    <td class="content-control-md">Quantity</td>
                                                    <td class="content-control-md">m2</td>
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
                                
                            </div>
                        </div>
                        <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>





    </div>
    <!-- Required vendors -->
   <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

@endsection
