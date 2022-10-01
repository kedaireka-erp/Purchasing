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
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Purchase Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Request Detail</a></li>
        </ol>
    </div>
@endsection

@section('content')





    <!--**********************************
                                                                                                                Content body start
                                                                                                            ***********************************-->

    <div class="row">
        <div class="col-md-5">
            <div class="card" style="height: 550px">
                <div class="card-header border-0 pb-0">
                    <h4 class="card-title"> Approval Tracking </h4>
                </div>
                <div class="card-body">
                    <div id="DZ_W_TimeLine" class="widget-timeline dlab-scroll height370">
                        <ul class="timeline">
                            {{-- @include('Approval.timeline') --}}
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
                            @foreach ($tracking->purchase as $purchase_requests)
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="post-input">
                                            <table style="margin-top: -150px">
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
                                                <br>
                                                <tr class="tr">
                                                    <td width="200px">Requester</td>
                                                    <td>: {{ $purchase_requests->requester }}</td>
                                                </tr>
                                                <br>
                                                <tr class="tr">
                                                    <td width="200px">Devisi</td>
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
                                                        <td scope="col">Outstanding</td>
                                                        <td scope="col">Sudah Datang</td>
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
                                                            <td>{{ $yes->outstanding }}</td>
                                                            <td>{{ $yes->sudah_datang }}</td>
                                                            <td>{{ $yes->satuan->unit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            @foreach ($tracking->item as $item)
                                            <form 
                                            action="{{ route('tracking.update_good', $item->id) }}"
                                                method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: 30px">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Sudah Datang </label>
                                                            <input name="sudah_datang" class="input-rounded form-control wide"
                                                                type="number">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-12" style="margin-top: 30px">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Tanggal Penerimaan </label>
                                                            <input name="tanggal_kedatangan_barang" class="input-rounded form-control wide"
                                                                type="date">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-12">
                                                        <button style="margin-top:10px" class="btn btn-primary"> Simpan
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                            @endforeach
                                        @elseif ($purchase_requests->type == 'powder')
                                            <table class="table table-striped" id="body">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <td scope="col">No.</td>
                                                        <td scope="col">Suppllier</td>
                                                        <td scope="col">Grade</td>
                                                        <td scope="col">Warna</td>
                                                        <td scope="col">Kode Warna</td>
                                                        <td scope="col">Finish</td>
                                                        <td scope="col">Outstanding</td>
                                                        <td scope="col">Sudah Datang</td>
                                                        <td scope="col">m2</td>

                                                    </tr>
                                                </thead>
                                                @php
                                                    $nomor = 1;
                                                @endphp

                                                {{-- @if ($item->id_request == $purchase_requests->id) --}}
                                                <tbody>

                                                    @foreach ($purchase_requests->powder as $yes)
                                                        <tr style="text-align: center">
                                                            <td>{{ $nomor++ }}</td>
                                                            <td>{{ $yes->supplier->vendor }}</td>
                                                            <td>{{ $yes->grade->type }}</td>
                                                            <td>{{ $yes->warna }}</td>
                                                            <td>{{ $yes->kode_warna }}</td>
                                                            <td>{{ $yes->finish }}</td>
                                                            <td>{{ $yes->outstanding }}</td>
                                                            <td>{{ $yes->sudah_datang }}</td>
                                                            <td>{{ $yes->m2 }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                {{-- @endif --}}

                                            </table>

                                        @endif

                                    </div>
                                </div>
                                
                                {{-- <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                
                                        </div>
                                    </div> --}}
                            </div>
                            @endforeach
                        </div>
                        <!-- Modal -->

                    </div>
                </div>
            </div>
        </div>
    </div>





    </div>

                                
                                
                                

@endsection
