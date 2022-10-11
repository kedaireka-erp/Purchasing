@extends('layout.sidebar')

@section('judul-laman', 'Approval Purchasing Request')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            Approve Purchasing Request
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Approval Manager</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Edit PR</a></li>
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
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link">Detail
                                        Request</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link active show">
                                        Edit Item
                                    </a>
                                </li>
                                <li class="nav-item"><a href="#approval" data-bs-toggle="tab" class="nav-link">
                                        Approval </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade">
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
                                                    @if ($purchase_requests->approval_status == 'pending')
                                                        <td width="200px">Tanggal Deadline</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->deadline_date)->format('d F Y') }}
                                                        </td>
                                                    @elseif ($purchase_requests->approval_status == 'approve')
                                                        <td width="200px">Tanggal Diterima</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}
                                                        </td>
                                                    @elseif ($purchase_requests->approval_status == 'reject')
                                                        <td width="200px">Tanggal Ditolak</td>
                                                        <td>:
                                                            {{ \Carbon\Carbon::parse($purchase_requests->tanggal_diterima)->format('d F Y') }}
                                                        </td>
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
                                <div id="about-me" class="tab-pane fade active show">
                                    <div class="profile-about-me">

                                        {{-- ini tabel item di tracking --}}
                                        @if ($purchase_requests->type == 'othergood')
                                            @foreach ($purchase_requests->item as $index => $good)
                                                <form action="{{ route('approval.update_good', $good->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="head" style="margin-top:50px"></div>

                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="item_name" class="form-label font pt-3">Nama
                                                                    Item {{ $index + 1 }} <span
                                                                        style="color:red">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="mb-3">
                                                                <select
                                                                    class="default-select input-rounded form-control wide mb-3"
                                                                    aria-label="Default select example" id="id_master_item"
                                                                    name="id_master_item"
                                                                    value="{{ old('id_master_item') }}">
                                                                    <option selected disabled>-- Pilih Item --</option>
                                                                    @foreach ($master_item as $items)
                                                                        <option value="{{ $items->id }}"
                                                                            {{ $items->id == $good->id_master_item ? 'selected' : '' }}>
                                                                            {{ ucfirst($items->item_name) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('id_master_item')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label for="quantity" class="form-label font pt-3">Quantity Item
                                                                {{ $index + 1 }} </label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="mb-3">
                                                                <input type="text" class="form-control input-rounded"
                                                                    value="{{ $good->stok }}" name="stok">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div class="mb-3">
                                                                <label for="item_name" class="form-label font pt-3">Satuan
                                                                    Item {{ $index + 1 }} <span
                                                                        style="color:red">*</span></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="mb-3">
                                                                <select
                                                                    class="default-select input-rounded form-control wide mb-3"
                                                                    aria-label="Default select example" id="id_satuan"
                                                                    name="id_satuan" value="{{ old('id_satuan') }}">
                                                                    <option selected disabled>-- Pilih Satuan --</option>
                                                                    @foreach ($satuan as $unit)
                                                                        <option value="{{ $unit->id }}"
                                                                            {{ $unit->id == $good->id_satuan ? 'selected' : '' }}>
                                                                            {{ ucfirst($unit->name) }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                @error('id_satuan')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <button style="margin-top:10px" class="btn btn-primary">
                                                                Simpan
                                                            </button>
                                                        </div>
                                                </form>
                                                <div class="col-lg-6">
                                                    <form action="{{ route('approval.itemdelete', $good->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button style="margin-top:10px" class="btn btn-danger">
                                                            Hapus
                                                        </button>
                                                    </form>

                                                </div>

                                    </div>

                                    <hr>
                                    @endforeach
                                @elseif ($purchase_requests->type == 'powder')
                                    @foreach ($purchase_requests->powder as $yes)
                                        <form action="{{ route('approval.update_powder', $yes->id) }}" method="post">
                                            @csrf
                                            <div class="head" style="margin-top:50px"></div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="warna" class="form-label font pt-3">warna</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control input-rounded"
                                                            value="{{ $yes->warna }}" name="warna">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="color_id" class="form-label font pt-3">Kode
                                                            Warna<span style="color:red">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="mb-3">
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            aria-label="Default select example" id="Grade"
                                                            name="color_id" value="{{ old('color_id') }}">
                                                            <option selected disabled>-- Pilih Kode Warna --</option>
                                                            @foreach ($colour as $gra)
                                                                <option value="{{ $gra->id }}"
                                                                    {{ $gra->id == $yes->color_id ? 'selected' : '' }}>
                                                                    {{ ucfirst($gra->name) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('color_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="mb-3">
                                                        <label for="Grade">Grade<span
                                                                style="color:red">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="mb-3">
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            aria-label="Default select example" id="Grade"
                                                            name="grades_id" value="{{ old('grades_id') }}">
                                                            <option selected disabled>-- Pilih Grade --</option>
                                                            @foreach ($Grade as $gra)
                                                                <option value="{{ $gra->id }}"
                                                                    {{ $gra->id == $yes->grades_id ? 'selected' : '' }}>
                                                                    {{ ucfirst($gra->tipe) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('grades_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <label for="Supplier">Supplier<span style="color:red">*</span></label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="mb-3">
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            aria-label="Default select example" id="Supplier"
                                                            name="suppliers_id" value="{{ old('suppliers_id') }}">
                                                            <option selected disabled>-- Pilih Supplier --</option>
                                                            @foreach ($Supplier as $sup)
                                                                <option value="{{ $sup->id }}"
                                                                    {{ $sup->id == $yes->suppliers_id ? 'selected' : '' }}>
                                                                    {{ ucfirst($sup->vendor) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('suppliers_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">


                                                        <label for="finish" class="form-label font">Finish</label>
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            aria-label="Default select example" name="finish">
                                                            <option value="{{ $yes->finish }}" selected>
                                                                {{ $yes->finish }}</option>
                                                            <option value="interior"> Interior </option>
                                                            <option value="eksterior"> Eksterior </option>
                                                        </select>


                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">


                                                        <label for="finishing" class="form-label font">Finishing</label>
                                                        <select class="default-select input-rounded form-control wide mb-3"
                                                            aria-label="Default select example" name="finishing">
                                                            <option selected value="{{ $yes->finishing }}">
                                                                {{ $yes->finishing }} </option>
                                                            <option value="SG"> SG </option>
                                                            <option value="MATT"> MATT </option>
                                                            <option value="SUPERMATT"> SUPERMATT </option>
                                                            <option value="GLOSS"> GLOSS </option>
                                                            <option value="METALLIC"> METALLIC </option>
                                                            <option value="SAND TEXTURE"> SAND TEXTURE </option>
                                                            <option value="SUBLIMASI"> SUBLIMASI </option>
                                                        </select>


                                                    </div>
                                                </div>


                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="quantity" class="form-label font">Quantity</label>
                                                        <input type="number" name="quantity"
                                                            class="form-control input-rounded"
                                                            value="{{ $yes->quantity }}">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal_pengajuan" class="form-label font">m2</label>
                                                        <input type="text" class="form-control input-rounded"
                                                            name="m2" value="{{ $yes->m2 }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <div class="col-">
                                                            <label for="tanggal_pengajuan"
                                                                class="form-label font">Estimasi
                                                                m2/Kg</label>
                                                            <input type="number" class="form-control input-rounded"
                                                                name="estimasi" value="{{ $yes->estimasi }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal_pengajuan" class="form-label font">Stock
                                                            Powder Fresh
                                                            (Kgs)
                                                        </label>
                                                        <input type="number" class="form-control input-rounded"
                                                            value="{{ $yes->fresh }}" name="fresh">
                                                    </div>
                                                </div>

                                            </div>



                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal_pengajuan" class="form-label font">Stock
                                                            Powder Recycle
                                                            (Kgs)</label>
                                                        <input type="number" class="form-control input-rounded"
                                                            value="{{ $yes->recycle }}" name="recycle">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="tanggal_pengajuan" class="form-label font">Alokasi
                                                            powder Fresh</label>
                                                        <input type="number" class="form-control input-rounded"
                                                            value="{{ $yes->alokasi }}" name="alokasi">
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="mb-3">
                                                <button style="margin-top:10px" class="btn btn-primary">
                                                    Simpan
                                                </button>
                                            </div>
                                        </form>
                                    @endforeach
                                    @endif

                                </div>
                            </div>


                            <div id="approval" class="tab-pane fade">

                                <form action="{{ route('approval.updateEditApp', $purchase_requests->id) }}" method="post">

                                    @csrf
                                    <div class="row">
                                        <div class="col-12" style="margin-top: 30px">
                                            <div class="mb-3">
                                                <label class="form-label"> Tanggal Penerimaan </label>
                                                <input name="tanggal_diterima" class="input-rounded form-control wide"
                                                    type="date">
                                            </div>
                                            <div class="status" style="margin-top:20px">
                                                <label class="form-label"> Ubah Status </label>
                                                <select class="default-select input-rounded form-control wide mb-3"
                                                    style="font-weight: bold; text-transform:uppercase;font-size:15px;text-align: center"
                                                    id="approval_status" name="approval_status">
                                                    <option disabled value="" selected>{{ $purchase_requests->approval_status }}</option>
                                                    @if ($purchase_requests->approval_status == 'pending')
                                                    <option value="approve">approve</option>
                                                    @elseif ($purchase_requests->approval_status == 'approve')
                                                    <option value="pending">pending</option>
                                                    @elseif ($purchase_requests->approval_status == 'reject')
                                                    <option value="approve">approve</option>
                                                    <option value="pending">pending</option>
                                                    @elseif ($purchase_requests->approval_status == 'edit')
                                                    <option value="approve">approve</option>
                                                    <option value="pending">pending</option>
                                                    @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Required vendors -->
   <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>

@endsection
