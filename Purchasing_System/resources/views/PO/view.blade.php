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
        {{-- <div class="col-md-5">
            <div class="card" style="height: 550px">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title"> Approval Tracking </h4>
                </div>
                <div class="card-body">
                    <div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height370">
                        <ul class="timeline">
                            @foreach ($orders->purchases as $purchase_requests)
                                @include('Approval.timeline')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                        class="nav-link active show">Detail Order</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">Detail Item
                                    </a>
                                </li>
                                {{-- <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab"
                                        class="nav-link"> Update Form </a>
                                </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="post-input">
                                            <table>
                                                <tr class="tr">
                                                    <td width="220px">Nomor PO</td>
                                                    <td>:
                                                        {{ $orders->no_po }}
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Supplier</td>
                                                    <td>:
                                                        {{ $orders->supplier->vendor }}
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Atas Nama Supplier</td>
                                                    <td>: {{ $orders->nama_supplier }}</td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Pembayaran</td>
                                                    <td>: {{ $orders->name_payment }}</td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Alamat Kirim</td>
                                                    <td>: {{ $orders->location_name }} </td>
                                                </tr>
                                                @if($orders->id_waktu == NULL)
                                                <tr class="tr">
                                                    <td width="200px">Waktu Pengiriman</td>
                                                    <td>:
                                                        {{ \Carbon\Carbon::parse($orders->tanggal_kirim)->format('d F Y') }}</td>
                                                </tr>
                                                @else
                                                <tr class="tr">
                                                    <td width="200px">Waktu Pengiriman</td>
                                                    <td>: {{ $orders->name_time }}</td>
                                                </tr>
                                                @endif
                                                <tr class="tr">
                                                    <td width="200px">Dibuat Pada</td>
                                                    <td>: {{ \Carbon\Carbon::parse($orders->created_at)->format('d F Y') }}
                                                    </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Nama Pembuat</td>
                                                    <td>: {{ $orders->nama }} 
                                                    </td>
                                                </tr>
                                                
                                                <tr class="tr">
                                                    <td width="200px">Alamat Penagihan</td>
                                                    <td>: {{ $orders->alamat_penagihan }} </td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Lain-lain</td>
                                                    <td>: {{ $orders->lain_lain }}</td>
                                                </tr>
                                                <tr class="tr">
                                                    <td width="200px">Note</td>
                                                    <td>: {{ $orders->note }}</td>
                                                </tr>
                                                

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @foreach ($orders->purchases as $purchase_requests)
                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me">
<div class="container col-10">
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
                <td class="content-control-sm">{{ $yes->supplier->vendor }}
                </td>
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
                                {{-- <div id="profile-settings" class="tab-pane fade">
                                    <div class="pt-3">
                                        <div class="settings-form">
                                            
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- Modal -->
@endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>





    </div>

@endsection
