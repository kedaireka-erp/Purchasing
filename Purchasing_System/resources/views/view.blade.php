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
                                <li class="nav-item"><a href="#setting" data-bs-toggle="tab"
                                            class="nav-link"> Attachment </a>
                                    </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="post-input">
                                            <table>
                                                <tr class="tr">
                                                    <td width="200px">Nomor PR</td>
                                                    <td>: {{ $purchase_requests->no_pr }}</td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="220px">Tanggal Pengajuan</td>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}
                                                    </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                <td width="200px">Tanggal Kebutuhan Barang Tiba</td>
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
                                                            <td width="200px">Tanggal Diterima Purchasing</td>
                                                            <td>:
                                                                {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
                                                            </td>
                                                        </tr>
                                                        <tr class="tr">
                                                        <td width="200px">Status</td>
                                                        <td>:
                                                            {{ $purchase_requests->approval_status . ' and ' . $purchase_requests->accept_status  }}
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
                                                        @if ($purchase_requests->accept_status == 'reject')
                                                        <tr class="tr">
                                                        <td width="200px">Tanggal Ditolak</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
                                                        </td>
                                                    </tr>
                                                        <tr class="tr">
                                                        <td width="200px">Status</td>
                                                        <td>:
                                                            {{ $purchase_requests->accept_status . 'ed by Tim Purchasing' }}
                                                        </td>
                                                        </tr>
                                                        @endif
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
                                                        @if ($purchase_requests->accept_status == 'reject')
                                                        <td width="200px">Tanggal Ditolak</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
                                                        </td>
                                                        <tr class="tr">
                                                        <td width="200px">Status</td>
                                                        <td>:
                                                            {{ $purchase_requests->accept_status . 'ed by Tim Purchasing' }}
                                                        </td>
                                                        </tr>
                                                        @endif
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
                                                
                                                <tr class="tr">
                                                    <td width="200px">Requester</td>
                                                    <td>: {{ $purchase_requests->requester }}</td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Divisi</td>
                                                    <td>: {{ $purchase_requests->Prefixe->divisi }}</td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Project/Customer</td>
                                                    <td>: {{ $purchase_requests->project }} </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Kebutuhan/Pengiriman</td>
                                                    <td>: {{ $purchase_requests->ship->tipe }} </td>
                                                </tr>
                                                
    
                                                <tr class="tr">
                                                    <td width="200px">Alamat Kirim</td>
                                                    <td>: {{ $purchase_requests->location->location_name }}</td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Status PR</td>
                                                    <td>: {{ $purchase_requests->status }} </td>
                                                </tr>
                                                
                                                @if($purchase_requests->approval_status == 'reject')
                                                <tr class="tr">
                                                    <td width="200px">Pesan Reject</td>
                                                    <td style="font-weight: 600">: {{ $purchase_requests->feedback_manager }}</td>
                                                </tr>
                                                @endif
                                                <tr class="tr">
                                                    <td width="200px">Note</td>
                                                    <td>: {!! $purchase_requests->note !!}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me pt-3">
                                        @if ($purchase_requests->type == 'othergood')
                                            <table class="table table-striped" id="body">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <td class="content-control-md" align="center">No.</td>
                                                        <td class="content-control-md" align="center">Description of Goods</td>
                                                        <td class="content-control-md" align="center">Quantity</td>
                                                        <td class="content-control-md" align="center">Unit</td>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $nomor = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($purchase_requests->item as $yes)
                                                        <tr style="text-align: center">
                                                            <td class="content-control-sm">{{ $nomor++ }}</td>
                                                            <td class="content-control-sm">{{ $yes->master_item->item_name }}</td>
                                                            <td class="content-control-sm">{{ $yes->stok }}</td>
                                                            <td class="content-control-sm">{{ $yes->satuan->unit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif ($purchase_requests->type == 'powder')
                                            @foreach ($purchase_requests->powder as $yes)
                                            <table>
                                                <tr class="tr">
                                                    <td width="200px">Warna</td>
                                                    <td>: {{ $yes->warna }}</td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="220px">Kode Warna</td>
                                                    <td>:
                                                        {{ $yes->colour->name }}
                                                    </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                <td width="200px">Finish</td>
                                                <td>:
                                                    {{ $yes->finish }}
                                                </td>
                                                </tr>

                                                <tr class="tr">
                                                    <td width="200px">Finishing</td>
                                                    <td>:
                                                        {{ $yes->finishing }}
                                                    </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Grade</td>
                                                    <td>: {{ $yes->grade->tipe }}</td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Supplier</td>
                                                    <td>: {{ $yes->supplier->vendor }}</td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Quantity</td>
                                                    <td>: {{ $yes->quantity }} </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">m2</td>
                                                    <td>: {{ $yes->m2 }} </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Estimasi m2/Kg</td>
                                                    <td>: {{ $yes->estimasi }} </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Stock Powder Fresh (Kgs)</td>
                                                    <td>: {{ $yes->fresh }} </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Alokasi powder Fresh</td>
                                                    <td>: {{ $yes->alokasi }} </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Stock Powder Recycle (Kgs)</td>
                                                    <td>: {{ $yes->recycle }} </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Alokasi outstanding (KGs)</td>
                                                    <td>: {{ $yes->alokasi }} </td>
                                                </tr>
                                            </table>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div id="setting" class="tab-pane fade">
                                    <div class="setting-content pt-3">
                                        <div class="post-input">
                                            <div class="col-4">
                                                <div class="d-flex justify-content-center">
                                                    <div class="signature">
                                                        

                                                        <embed src="{{ asset('storage/assets\images/' . $purchase_requests->attachment) }}" style=" margin-left:520px; width:750px; height:400px">
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
