@extends('layout.sidebar')

@section('judul-laman', 'Ubah Tracking')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            Tracking
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Request Tracking</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Other Good</a></li>
        </ol>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab"
                                        class="nav-link">Detail Request</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show"> Update Outstanding </a>
                                </li>
                            </ul>
                            
                                <div class="tab-content">
                                    <div id="my-posts" class="tab-pane fade">
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
                                                        <td>: {{ \Carbon\Carbon::parse($tracking->order->created_at)->format('d F Y') }}
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



                            <div id="about-me" class="tab-pane fade active show">
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
                                               
                                                {{-- @foreach ($purchase_requests->item as $yes) --}}
                                                <tr style="text-align: center">
                                                    <td>{{ $nomor++ }}</td>
                                                    <td>{{ $tracking->item->master_item->item_name }}</td>
                                                    <td>{{ $tracking->item->outstanding }}</td>
                                                    <td>{{ $tracking->item->sudah_datang }}</td>
                                                </tr>
                                               
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                    
                                            

                                          
                                            {{-- @elseif ($purchase_requests->type == 'powder')
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
                                                @endphp --}}

                                            {{-- @if ($item->id_request == $purchase_requests->id) --}}
                                            {{-- <tbody>

                                                    @foreach ($purchase_requests->powder as $yes)
                                                        <tr style="text-align: center">
                                                            <td>{{ $nomor++ }}</td>
                                                            <td>{{ $yes->supplier->vendor }}</td>
                                                            <td>{{ $yes->grade->tipe }}</td>
                                                            <td>{{ $yes->warna }}</td>
                                                            <td>{{ $yes->colour->name }}</td>
                                                            <td>{{ $yes->finish }}</td>
                                                            <td>{{ $yes->outstanding }}</td>
                                                            <td>{{ $yes->sudah_datang }}</td>
                                                            <td>{{ $yes->m2 }}</td>
                                                        </tr>
                                                        
                                                    @endforeach
                                                </tbody>
                                                {{-- @endif --}}

                                            {{-- </table> --}}
                                            {{-- @foreach ($tracking->powder1 as $powder) --}}

                                    @if($tracking->item->outstanding != 0 )

                                            <form 
                                            action="{{ route('tracking.update_good', $tracking->item->id) }}"
                                                method="post">
                                                @csrf
                                                <div class="row">
                                                    
                                                    <div class="col-12" style="margin-top: 30px">
                                                        <div class="mb-3">
                                                            <label class="form-label"> Barang Datang </label>
                                                            <input name="sudah_datang" class="input-rounded form-control wide"
                                                                type="number" required>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-12" style="margin-top: 30px">
                                                        <div class="mb-3" >
                                                            <label class="form-label"> Tanggal Penerimaan </label>
                                                            <input name="tanggal_kedatangan_barang" class="input-rounded form-control wide"
                                                                type="date" required>
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="col-12">
                                                        <button style="margin-top:10px" class="btn btn-primary"> Simpan
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                        @else
                                        <form action="{{ route('tracking.update_good_status', $tracking->order->id) }}" method="POST">
                                            @csrf
                                            <div class="col-12" style="margin-top: 30px">
                                                <div class="mb-3">
                                                    <label class="form-label"> Nomor Surat Jalan </label>
                                                    <input name="nomor_jalan" class="input-rounded form-control wide"
                                                        type="text" required>
                                                </div>
                                                
                                            </div>
                                            <div class="status" style="margin-top:30px">
                                                <label class="form-label"> Status PR </label>
                                                <select class="default-select input-rounded form-control wide mb-3"
                                                    style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                    id="status" name="status">
                                                    <option value="{{ $tracking->order->status }}" selected>
                                                        {{ $tracking->order->status }}</option>
                                                    <option value="outstanding">outstanding</option>
                                                    <option value="closed">closed</option>
                                                </select>
                                               
                                                    <button type="submit" style="margin-top:10px" class="btn btn-primary"> Simpan
                                                    </button>
                                                
                                            </div>
                                        </form>
                                        @endif
                                            {{-- @endforeach
                                        --}}
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


                </div>
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
    </div>





    </div>





@endsection
