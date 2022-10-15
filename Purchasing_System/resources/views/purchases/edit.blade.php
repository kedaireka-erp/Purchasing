@extends('layout.sidebar')

@section('judul-laman', 'Approval PR')

@section('Judul-content')

    <div class="d-flex justify-content-between">
        <div class="title-page">
            Edit PR
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('datatable')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">


@endsection

@section('wrap_title')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Purchase Request</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Edit PR</a></li>
        </ol>
    </div>
@endsection

@section('content')


    <div class="row">
        
            <div class="card">
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#my-posts" data-bs-toggle="tab" class="nav-link active show">
                                        Edit Detail
                                        Request</a>
                                </li>
                                <li class="nav-item"><a href="#about-me" data-bs-toggle="tab" class="nav-link">
                                        Edit Item
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <div class="post-input">



                                            <form action="{{ route('purchase_request.update', $purchase_requests->id) }}"
                                                method="post">
                                                @csrf


                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="deadline_date" class="form-label pt-4">Deadline
                                                            Date</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="date" class="form-control input-rounded wide"
                                                            placeholder="dd/mm/yy" name="deadline_date"
                                                            value="{{ $purchase_requests->deadline_date }}">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="requester" class="form-label pt-4">Requester</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control input-rounded wide"
                                                            id="requester" placeholder="requester" name="requester"
                                                            value="{{ $purchase_requests->requester }}">
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="prefixes_id" class="form-label pt-4">Divisi</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select class="default-select input-rounded form-control wide"
                                                            id="Prefixe" name="prefixes_id">
                                                            @foreach ($Prefixe as $prefixe)
                                                                <option value="{{ $prefixe->id }}"
                                                                    {{ $prefixe->id == $purchase_requests->prefixe_id ? 'selected' : '' }}>
                                                                    {{ $prefixe->divisi }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="project" class="form-label pt-4">Project</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <input type="text" class="form-control input-rounded wide"
                                                            id="project" placeholder="Project" name="project"
                                                            value="{{ $purchase_requests->project }}">
                                                    </div>
                                                </div>



                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="locations_id" class="form-label pt-4">Kebutuhan</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select class="default-select input-rounded form-control wide"
                                                            id="Ship" name="ships_id">
                                                            @foreach ($Ship as $ship)
                                                                <option value="{{ $ship->id }}"
                                                                    {{ $ship->id == $purchase_requests->ships_id ? 'selected' : '' }}>
                                                                    {{ $ship->tipe }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="attachment"
                                                            class="form-label form-label pt-3">Attachment</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="input-group input-group-lg">
                                                            <span class="input-group-text">Upload</span>
                                                            <div class="form-file">
                                                                <input type="file"
                                                                    class="form-file-input form-control input-rounded @error('attachment') is-invalid @enderror"
                                                                    id="attachment" placeholder="Attachment"
                                                                    name="attachment"
                                                                    value="{{ old('attachment', $purchase_requests->attachment) }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="locations_id" class="form-label pt-4">Lokasi</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <select class="default-select input-rounded form-control wide"
                                                            id="Location" name="locations_id">
                                                            @foreach ($Location as $location)
                                                                <option value="{{ $location->id }}"
                                                                    {{ $location->id == $purchase_requests->locations_id ? 'selected' : '' }}>
                                                                    {{ $location->location_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="note" class="form-label pt-4">Note</label>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <textarea class="form-control input-rounded" id="note1" placeholder="-- INPUT --" name="note"
                                                            value="{{ $purchase_requests->note }}">{{ $purchase_requests->note }}</textarea>
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div id="about-me" class="tab-pane fade">
                                    <div class="profile-about-me">
                                        @if ($purchase_requests->type == 'othergood')
                                            @foreach ($purchase_requests->item as $index => $good)
                                                <form action="{{ route('purchase_request.update_good', $good->id) }}"
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
                                                                    aria-label="Default select example"
                                                                    id="id_master_item" name="id_master_item"
                                                                    value="{{ old('id_master_item') }}">
                                                                    <option selected disabled>-- Pilih Item --</option>
                                                                    @foreach ($master_item as $itemss)
                                                                        <option value="{{ $itemss->id }}"
                                                                            {{ $itemss->id == $good->id_master_item ? 'selected' : '' }}>
                                                                            {{ ucfirst($itemss->item_name) }}
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
                                                            <label for="quantity" class="form-label font pt-3">Quantity
                                                                Item
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
                                            @endforeach
                                            <hr>
                                        @elseif ($purchase_requests->type == 'powder')
                                            @foreach ($purchase_requests->powder as $yes)
                                                <form action="{{ route('purchase_request.update_powder', $yes->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <div class="head" style="margin-top:50px"></div>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label for="warna"
                                                                class="form-label font pt-3">warna</label>
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
                                                                    <option selected disabled>-- Pilih Kode Warna --
                                                                    </option>
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
                                                                <select
                                                                    class="default-select input-rounded form-control wide mb-3"
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
                                                            <label for="Supplier">Supplier<span
                                                                    style="color:red">*</span></label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="mb-3">
                                                                <select
                                                                    class="default-select input-rounded form-control wide mb-3"
                                                                    aria-label="Default select example" id="Supplier"
                                                                    name="suppliers_id"
                                                                    value="{{ old('suppliers_id') }}">
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


                                                                <label for="finish"
                                                                    class="form-label font">Finish</label>
                                                                <select
                                                                    class="default-select input-rounded form-control wide mb-3"
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


                                                                <label for="finishing"
                                                                    class="form-label font">Finishing</label>
                                                                <select
                                                                    class="default-select input-rounded form-control wide mb-3"
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
                                                                <label for="quantity"
                                                                    class="form-label font">Quantity</label>
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
                                                                    <input type="number"
                                                                        class="form-control input-rounded" name="estimasi"
                                                                        value="{{ $yes->estimasi }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="tanggal_pengajuan"
                                                                    class="form-label font">Stock
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
                                                                <label for="tanggal_pengajuan"
                                                                    class="form-label font">Stock
                                                                    Powder Recycle
                                                                    (Kgs)</label>
                                                                <input type="number" class="form-control input-rounded"
                                                                    value="{{ $yes->recycle }}" name="recycle">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label for="tanggal_pengajuan"
                                                                    class="form-label font">Alokasi
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



                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
   

    <!-- Required vendors -->
    <script src="{{ asset('assets/vendor/global/global.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="{{ asset('layout/ckeditor.js') }}"></script>



@endsection
