@extends('layout.sidebar')

@section('judul-laman', 'Terima Purchasing Request')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            Terima Purchasing Request
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Approval Tim Purchasing</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Approval</a></li>
        </ol>
    </div>
@endsection

@section('content')




    {{-- <div class="container">

        <div class="viewpr">
            <div id="header">
                <div class="row">
                    <div class="col-6" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-3">
                                <img class="logo_pr" src="{{ asset('images/logo_compagnie.png') }}">
                            </div>
                            <div class="col-9">
                                <span class="text_pr">PT. ALLURE ALLUMINIO</span>
                                <p class="subtext_pr">Jakarta</p>
                                <p class="subtext_pr">Telp: (021) 45850530</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-2"></div>

                    <div class="col-4">
                        <span class="bold"> Purchase Request </span>
                        <p class="text_pr">No: {{ $purchase_requests->no_pr }}</p>
                        <table style="margin-top: 20px " class="subhead_pr">
                            <tr>
                                <td>Pengajuan</td>
                                <td>: {{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</td>
                            </tr>
                            <br>
                            <tr>
                                <td width="80px">Deadline</td>
                                <td>: {{ \Carbon\Carbon::parse($purchase_requests->deadline_date)->format('d F Y') }}</td>
                            </tr>
                            <br>
                            <tr>
                                <td width="80px">Alamat</td>
                                <td>: {{ $purchase_requests->location->location_name }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>


            <table class="table table-striped" id="body">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">No.</th>
                        <th scope="col">Description of Goods</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit</th>
                    </tr>
                </thead>
                @php
                    $nomor = 1;
                @endphp

                
                <tbody>

                    @foreach ($purchase_requests->item as $yes)
                        <tr style="text-align: center">
                            <td>{{ $nomor++ }}</td>
                            <td>{{ $yes->master_item }}</td>
                            <td>{{ $yes->stok }}</td>
                            <td>{{ $yes->satuan }}</td>
                        </tr>
                    @endforeach




                </tbody>
               
            </table>

            <div id="footer" style="margin-top: 80px">
                <hr>
                <div class="row">
                    <div class="col-6">
                        <p class="subhead_pr">Project/Customer : {{ $purchase_requests->project }}</p>
                        <p class="subhead_pr" style="margin-top: 130px">Kebutuhan/Pengiriman : <span
                                style="font-weight: bold">{{ $purchase_requests->Ship->type }}</span></p>
                        <p class="subhead_pr">Note : {{ $purchase_requests->note }} </p>
                    </div>
                    <div class="col-1"></div>

                    <div class="col-5" align="center">
                        <p class="subhead_pr">Requester/Divisi : {{ $purchase_requests->requester }}/
                            {{ $purchase_requests->Prefixe->divisi }} </p>

                        @if ($purchase_requests->approval_status == 'pending')
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="orange"
                                class="bi bi-pause-circle-fill" viewBox="0 0 16 16" style="margin-top:30px">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z" />
                            </svg>
                        @elseif($purchase_requests->approval_status == 'approve')
                            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="green"
                                class="bi bi-check-circle-fill" viewBox="0 0 16 16"style="margin-top:30px">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                        @endif


                        <p class="subhead_pr" style="margin-top:20px"><span
                                style="font-weight: bold; text-transform:uppercase;font-size:15px">{{ $purchase_requests->approval_status }}</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div style="margin-top:100px"></div>
    </div> --}}


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
                            @if ($purchase_requests->approval_status == 'pending' && $purchase_requests->accept_status == 'pending')
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
                                        <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
                                        <h6 class="mb-0"> Purchase Request telah diajukan</h6>
                                        <p align="justify"> Puchase Request masuk dalam tahap pending, segera hubungi
                                            menager divisi untuk melakukan pengecekan dan approval</p>
                                    </a>
                                </li>
                            @elseif($purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'pending')
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
                                        <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
                                        <h6 class="mb-0"> Purchase Request telah diajukan</h6>
                                        <p align="justify"> Pengajuan Puchase Request telah disetujui, tetapi belum diterima
                                            oleh tim Purchasing</p>
                                    </a>
                                </li>
                            @elseif($purchase_requests->approval_status == 'approve' && $purchase_requests->accept_status == 'accept')
                                <li>
                                    <div class="timeline-badge success"></div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span> {{ \Carbon\Carbon::parse($purchase_requests->updated_at)->format('d F Y') }}
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
                                        <span>{{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</span>
                                        <h6 class="mb-0"> Purchase Request telah diajukan</h6>
                                        <p align="justify"> Pengajuan Puchase Request telah disetujui semua pihak</p>
                                    </a>
                                </li>
                            @endif
                            {{-- <li>
                                    <div class="timeline-badge danger">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>30 minutes ago</span>
                                        <h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge success">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>15 minutes ago</span>
                                        <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge warning">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li>
                                <li>
                                    <div class="timeline-badge dark">
                                    </div>
                                    <a class="timeline-panel text-muted" href="#">
                                        <span>20 minutes ago</span>
                                        <h6 class="mb-0">Mashable, a news website and blog, goes live.</h6>
                                    </a>
                                </li> --}}
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
                                <li class="nav-item"><a href="#approval" data-bs-toggle="tab" class="nav-link">
                                        Approval </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        {{-- <div class="post-input">
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
                                                    <td>: {{ $purchase_requests->requester }} </td>
                                                </tr>
                                                <br>

                                                <tr class="tr">
                                                    <td width="200px">Alamat</td>
                                                    <td>: {{ $purchase_requests->location->location_name }}</< /td>
                                                </tr>
                                                <br>
                                                <tr class="tr">
                                                    <td width="200px">Note</td>
                                                    <td>: {{ $purchase_requests->note }}</td>
                                                </tr>
                                                <br>
                                                <tr class="tr">
                                                    <td width="200px">Approval PR</td>
                                                    <td>: {{ $purchase_requests->approval_status }}</td>
                                                </tr>

                                            </table>
                                        </div> --}}

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
                                                    <tr style="text-align: center">
                                                        <td scope="col">No.</td>
                                                        <td scope="col">Suppllier</td>
                                                        <td scope="col">Grade</td>
                                                        <td scope="col">Warna</td>
                                                        <td scope="col">Kode Warna</td>
                                                        <td scope="col">Finish</td>
                                                        <td scope="col">Quantity</td>
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
                                                            <td>{{ $yes->quantity }}</td>
                                                            <td>{{ $yes->m2 }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                {{-- @endif --}}
                                            </table>
                                        @endif

                                    </div>
                                </div>


                                <div id="approval" class="tab-pane fade">

                                    <form action="{{ route('approval.update_accept', $purchase_requests->id) }}"
                                        method="post">

                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="status" style="margin-top:30px">
                                                    <select class="default-select input-rounded form-control wide mb-3"
                                                        style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                        id="approval_status" name="accept_status">
                                                        <option value="{{ $purchase_requests->accept_status }}" selected
                                                            disabled>
                                                            {{ $purchase_requests->accept_status }}</option>
                                                        <option value="pending">pending</option>
                                                        <option value="accept">accept</option>
                                                        <option value="reject">reject</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button style="margin-top:10px" class="btn btn-primary"> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                            <!-- Modal -->

                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>
    <!--**********************************
                                                                                                                                                        Content body end
                                                                                                                                                    ***********************************-->

@endsection
