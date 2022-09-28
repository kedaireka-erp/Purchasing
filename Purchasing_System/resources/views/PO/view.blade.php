@extends('layout.sidebar')

@section('judul-laman', 'View Purchasing Request')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            View Purchasing Request
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Purchase Order</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Order Detail</a></li>
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
                        @foreach($orders->purchases as $value)
                        @if ($value->approval_status == 'pending' && $value->accept_status == 'pending')
                       
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span> Pending </span>
                                    <h6 class="mb-0"> Purchase Request belum diterima oleh tim Purchasing </strong>.
                                    </h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span> Pending </span>
                                    <h6 class="mb-0"> Purchase Request belum mendapat persetujuan dari manager divisi
                                    </h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge danger">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>{{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}</span>
                                    <h6 class="mb-0"> Purchase Request telah diajukan</h6>
                                    <p align="justify"> Puchase Request masuk dalam tahap pending, segera hubungi
                                        menager divisi untuk melakukan pengecekan dan approval</p>
                                </a>
                            </li>
                        @elseif($value->approval_status == 'approve' && $value->accept_status == 'pending')
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span> Pending </span>
                                    <h6 class="mb-0"> Purchase Request belum diterima oleh tim Purchasing </strong>.
                                    </h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
                                    </h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge warning">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>{{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}</span>
                                    <h6 class="mb-0"> Purchase Request telah diajukan</h6>
                                    <p align="justify"> Pengajuan Puchase Request telah disetujui, tetapi belum diterima
                                        oleh tim Purchasing</p>
                                </a>
                            </li>
                        @elseif($value->approval_status == 'approve' && $value->accept_status == 'accept')
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span> {{ \Carbon\Carbon::parse($value->updated_at)->format('d F Y') }}
                                    </span>
                                    <h6 class="mb-0"> Purchase Request telah diterima oleh tim Purchasing </strong>.
                                    </h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <h6 class="mb-0"> Purchase Request telah mendapat persetujuan dari manager divisi
                                    </h6>
                                </a>
                            </li>
                            <li>
                                <div class="timeline-badge success">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>{{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}</span>
                                    <h6 class="mb-0"> Purchase Request telah diajukan</h6>
                                    <p align="justify"> Pengajuan Puchase Request telah disetujui semua pihak</p>
                                </a>
                            </li>
                        @endif
                        @endforeach
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
                                    class="nav-link active show">Detail Order</a>
                            </li>
                            <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">Detail Item </a>
                            </li>
                            {{-- <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                        class="nav-link"> Update Form </a>
                                </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div id="my-posts" class="tab-pane fade active show">
                                <div class="my-post-content pt-3">
                                    <div class="post-input">
                                        <table style="margin-top: -180px">
                                            <tr class="tr">
                                                <td width="220px">Nomor PO</td>
                                                <td>:
                                                    {{ $orders->no_po }}
                                                </td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Supplier</td>
                                                <td>:
                                                    {{ $orders->supplier }}
                                                </td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Nama Supplier</td>
                                                <td>: {{ $orders->nama_supplier }}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Pembayaran</td>
                                                <td>: {{ $orders->payment->name}}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Alamat Kirim</td>
                                                <td>: {{ $orders->location->name }} </td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Waktu Pengiriman</td>
                                                <td>: {{ $orders->timeshipping->name}}</< /td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Alamat Penagihan</td>
                                                <td>: {{ $orders->alamat_penagihan }} </td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Lain-lain</td>
                                                <td>: {{$orders->lain_lain }}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Note</td>
                                                <td>: {{ $orders->note }}</td>
                                            </tr>
                                            <br>
                                            <tr class="tr">
                                                <td width="200px">Create At</td>
                                                <td>: {{ \Carbon\Carbon::parse($orders->created_at)->format('d F Y') }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="about-me" class="tab-pane fade">
                                <div class="profile-about-me">
                                      {{-- ini tabel item di tracking --}}
                                      
                                </div>
                            </div>
                            {{-- <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            
                                    </div>
                                </div> --}}
                        </div>
                    </div>
                    <!-- Modal -->

                </div>
            </div>
        </div>
    </div>
</div>





</div>

@endsection
