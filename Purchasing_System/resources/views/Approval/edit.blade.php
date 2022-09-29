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
                                        </div>
                                    </div>
                                </div>
                                <div id="about-me" class="tab-pane fade active show">
                                    <div class="profile-about-me">

                                        {{-- ini tabel item di tracking --}}
                                        @if ($purchase_requests->type == 'othergood')
                                        @elseif ($purchase_requests->type == 'powder')
                                            @foreach ($purchase_requests->powder as $yes)
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
                                                            <select
                                                                class="default-select input-rounded form-control wide mb-3"
                                                                aria-label="Default select example" id="Grade"
                                                                name="color_id" value="{{ old('color_id') }}">
                                                                <option selected disabled>-- Pilih Kode Warna --</option>
                                                                @foreach ($colour as $gra)
                                                                    <option value="{{ $gra->id }}">
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
                                                            <select
                                                                class="default-select input-rounded form-control wide mb-3"
                                                                aria-label="Default select example" id="Grade"
                                                                name="grades_id" value="{{ old('grades_id') }}">
                                                                <option selected disabled>-- Pilih Grade --</option>
                                                                @foreach ($Grade as $gra)
                                                                    <option value="{{ $gra->id }}">
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
                                                        <label for="Supplier">Supplier<span
                                                                style="color:red">*</span></label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="mb-3">
                                                            <select
                                                                class="default-select input-rounded form-control wide mb-3"
                                                                aria-label="Default select example" id="Supplier"
                                                                name="suppliers_id" value="{{ old('suppliers_id') }}">
                                                                <option selected disabled>-- Pilih Supplier --</option>
                                                                @foreach ($Supplier as $sup)
                                                                    <option value="{{ $sup->id }}">
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
                                                            <select
                                                                class="default-select input-rounded form-control wide mb-3"
                                                                aria-label="Default select example" name="finish">
                                                                <option selected disabled> -- PILIH OPSI -- </option>
                                                                <option value="interior"> Interior </option>
                                                                <option value="eksterior"> Eksterior </option>
                                                            </select>


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">


                                                            <label for="finishing"
                                                                class="form-label font">Finishing</label>
                                                            <select
                                                                class="default-select input-rounded form-control wide mb-3"
                                                                aria-label="Default select example" name="finishing">
                                                                <option selected disabled> -- PILIH OPSI-- </option>
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
                                                            <label for="tanggal_pengajuan"
                                                                class="form-label font">m2</label>
                                                            <input type="number" class="form-control input-rounded"
                                                                name="m2"  value="{{ $yes->m2 }}">
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
                                                                    name="estimasi"  value="{{ $yes->estimasi }}">
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
                                            @endforeach
                                        @endif
                                        <button style="margin-top:10px" class="btn btn-primary"> Simpan
                                        </button>
                                    </div>
                                </div>


                                <div id="approval" class="tab-pane fade">

                                    <form action="{{ route('approval.updateApp', $purchase_requests->id) }}"
                                        method="post">

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
                                                        <option value="{{ $purchase_requests->approval_status }}" selected
                                                            disabled>
                                                            {{ $purchase_requests->approval_status }}</option>
                                                        <option value="pending">pending</option>
                                                        <option value="approve">approve</option>
                                                        <option value="ignore">ignore</option>
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
