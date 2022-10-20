@extends('layout.sidebar')

@if ($tracking->order->status == 'outstanding')
    @section('judul-laman', 'Ubah Tracking')
@elseif ($tracking->order->status == 'closed')
    @section('judul-laman', 'Detail Tracking')
@endif

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request Tracking</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Other Good</a></li>
        </ol>
    </div>
@endsection

@section('title_content', 'Request Tracking')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                @if ($tracking->order->status == 'outstanding')
                                    <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link">Detail
                                            Request</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                            class="nav-link active show">
                                            Update Outstanding </a>
                                    </li>
                                @elseif($tracking->order->status == 'closed')
                                    <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                            class="nav-link active show">Detail
                                            Request</a>
                                    </li>
                                    <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link ">
                                            Item </a>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                @if ($tracking->order->status == 'outstanding')
                                    <div id="my-posts" class="tab-pane fade">
                                    @elseif($tracking->order->status == 'closed')
                                        <div id="my-posts" class="tab-pane fade active show">
                                @endif
                                <div class="my-post-content pt-3">
                                    <div class="post-input">
                                        <table>
                                            <tr class="tr">
                                                <td width="220px">Nomor PO</td>
                                                <td>:
                                                    {{ $tracking->order->no_po }}
                                                </td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Requester</td>
                                                <td>:
                                                    {{ $tracking->purchase->requester }}
                                                </td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Divisi</td>
                                                <td>:
                                                    {{ $tracking->purchase->Prefixe->divisi }}
                                                </td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Supplier</td>
                                                <td>:
                                                    {{ $tracking->order->supplier->vendor }}
                                                </td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Atas Nama Supplier</td>
                                                <td>: {{ $tracking->order->nama_supplier }}</td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Pembayaran</td>
                                                <td>: {{ $tracking->order->payment->name_payment }}</td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Dibuat Pada</td>
                                                <td>:
                                                    {{ \Carbon\Carbon::parse($tracking->order->created_at)->format('d F Y') }}
                                                </td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Nama Pembuat</td>
                                                <td>: {{ $tracking->order->nama }}
                                                </td>
                                            </tr>

                                            <tr class="tr">
                                                <td width="200px">Alamat Penagihan</td>
                                                <td>: {{ $tracking->order->alamat_penagihan }} </td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Lain-lain</td>
                                                <td>: {{ $tracking->order->lain_lain }}</td>
                                            </tr>
                                            <tr class="tr">
                                                <td width="200px">Note</td>
                                                <td>: {{ $tracking->order->note }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @if ($tracking->order->status == 'outstanding')
                                <div id="about-me" class="tab-pane fade active show">
                                @elseif($tracking->order->status == 'closed')
                                    <div id="about-me" class="tab-pane fade">
                            @endif

                            @if ($tracking->order->status == 'outstanding')
                                <div class="profile-about-me">
                                    <div class="container col-8">
                                        <table class="table table-striped" id="body">
                                            <thead>
                                                <tr style="text-align: center">
                                                    <td scope="col">No.</td>
                                                    <td scope="col">Description of Goods</td>
                                                    <td scope="col">Outstanding</td>
                                                    <td scope="col">Sudah Datang</td>
                                                </tr>
                                            </thead>
                                            @php
                                                $nomor = 1;
                                            @endphp
                                            <tbody>
                                                <tr style="text-align: center">
                                                    <td>{{ $nomor++ }}</td>
                                                    <td>{{ $tracking->item->master_item->item_name }}</td>
                                                    <td>{{ $tracking->item->outstanding }}</td>
                                                    <td>{{ $tracking->item->sudah_datang }}</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        @if ($tracking->item->outstanding != 0)
                                            <form action="{{ route('tracking.update_good', $tracking->item->id) }}"
                                                method="post">

                                                <div class="mb-3">
                                                    <label class="form-label"> Barang Datang </label>
                                                    <input name="sudah_datang" placeholder="--INPUT--"
                                                        class="input-rounded form-control wide" type="number" required>

                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"> Tanggal Penerimaan </label>
                                                    <input name="tanggal_kedatangan_barang"
                                                        class="input-rounded form-control wide" type="date"
                                                        id="date" required>
                                                </div>
                                                <div class="mb-3">
                                                    <button style="margin-top:10px" class="btn btn-primary"> Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        @elseif($tracking->item->outstanding == 0)
                                            <form action="{{ route('tracking.update_good_status', $tracking->order->id) }}"
                                                method="POST">
                                                @csrf
                                                <div class="mb-3" style="margin-top: 50px">
                                                    <label class="form-label"> Nomor Surat Jalan </label>
                                                    <input name="nomor_jalan" placeholder="--INPUT--"
                                                        class="input-rounded form-control wide" type="text" required>
                                                </div>
                                                @if ($tracking->order->status == 'outstanding')
                                                    <div class="mb-3">
                                                        <label class="form-label"> Status PR </label>
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                            id="status" name="status">
                                                            <option value="{{ $tracking->order->status }}" selected>
                                                                {{ $tracking->order->status }}</option>
                                                            <option value="closed">closed</option>
                                                        </select>
                                                    </div>
                                                @elseif($tracking->order->status == 'closed')
                                                    <div class="mb-3">
                                                        <label class="form-label"> Status PR </label>
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                            id="status" name="status">
                                                            <option value="{{ $tracking->order->status }}" selected>
                                                                {{ $tracking->order->status }}</option>
                                                            <option value="outstanding">outstanding</option>
                                                        </select>
                                                    </div>
                                                @endif
                                                <div class="mb-3">
                                                    <button type="submit" style="margin-top:10px"
                                                        class="btn btn-primary">
                                                        Simpan
                                                    </button>
                                                </div>
                                            </form>
                                        @endif
                                    @elseif($tracking->order->status == 'closed')
                                        <div class="container col-8">
                                            <table class="table table-striped" id="body">
                                                <thead>
                                                    <tr style="text-align: center">
                                                        <td scope="col">No.</td>
                                                        <td scope="col">Description of Goods</td>
                                                        <td scope="col">Outstanding</td>
                                                        <td scope="col">Sudah Datang</td>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $nomor = 1;
                                                @endphp
                                                <tbody>
                                                    <tr style="text-align: center">
                                                        <td>{{ $nomor++ }}</td>
                                                        <td>{{ $tracking->item->master_item->item_name }}</td>
                                                        <td>{{ $tracking->item->outstanding }}</td>
                                                        <td>{{ $tracking->item->sudah_datang }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            // alert(maxDate);
            $('#date').attr('min', maxDate);
        });
    </script>

@endsection
