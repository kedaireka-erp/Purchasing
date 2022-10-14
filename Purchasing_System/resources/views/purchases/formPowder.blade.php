<form action="{{ route('purchase_request.storepowder') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="type" class="form-label font">Type<span style="color:red">*</span></label>
                <input readonly name="type" id="type" class="form-control input-rounded " value="powder"
                    selected>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="deadline_date" class="form-label">Tanggal
                    Kebutuhan Barang<span style="color:red">*</span></label>
                <input id="inputdate_powder" type="date" class="form-control input-rounded @error('deadline_date') is-invalid @enderror"
                    id="deadline_date" placeholder="-- INPUT --" name="deadline_date"
                    value="{{ old('deadline_date') }}" required>

                @error('deadline_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="requester" class="form-label">Requester<span style="color:red">*</span></label>
                <input type="text" class="form-control input-rounded @error('requester') is-invalid @enderror"
                    id="requester" placeholder="-- INPUT --" name="requester" value="{{ old('requester') }}" autofocus required>

                @error('requester')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="prefixes_id" class="form-label">Divisi<span style="color:red">*</span></label>
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-2">
                        <div id="reader_prefix"></div>
                        @error('prefixes_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-2">
                        <a onClick="prefix_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                            style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                style="font-size:14px"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="project" class="form-label">Project/Customer</label>
                <input type="text" class="form-control input-rounded @error('project') is-invalid @enderror"
                    id="project" placeholder="-- INPUT --" name="project" value="{{ old('project') }}">

                @error('project')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="Location">Lokasi<span style="color:red">*</span></label>
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-2">
                        <div id="reader_location"></div>
                        @error('locations_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-2">
                        <a onClick="location_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                            style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                style="font-size:14px"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="Ship">Kebutuhan/ Pengiriman<span style="color:red">*</span></label>
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-2">
                        <div id="reader_ships"></div>
                        @error('ships_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-2">
                        <a onClick="ships_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                            style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                style="font-size:14px"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">

                <div class="basic-form custom_file_input">

                    <label for="attachment" class="form-label">Attachment</label>
                    <div class="input-group input-group-lg">
                        <span class="input-group-text">Upload</span>
                        <div class="form-file">
                            <input type="file"
                                class="form-file-input form-control input-rounded @error('attachment') is-invalid @enderror"
                                id="attachment" placeholder="Attachment" name="attachment">
                        </div>
                    </div>


                </div>


                @error('attachment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="warna" class="form-label font">warna<span style="color:red">*</span></label></label>
                <input type="text" class="form-control input-rounded @error('warna') is-invalid @enderror" placeholder="--INPUT--" name="warna" required>
                @error('warna')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="Grade">Kode Warna<span style="color:red">*</span></label>

                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-2">
                        <div id="reader_color" class=" @error('color_id') is-invalid @enderror"></div>
                        @error('color_id')
    <span class="text-danger">{{ $message }}</span>
@enderror
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-2">
                        <a onClick="color_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                            style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                style="font-size:14px"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="Grade">Grade<span style="color:red">*</span></label>

                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-2">
                        <div id="reader_grade"></div>
                        @error('grades_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-2">
                        <a onClick="grade_create()" data-bs-toggle="modal" data-bs-target="#exampleModalPowderCenter"
                            style="width: 100%" class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                style="font-size:14px"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="Supplier">Supplier<span style="color:red">*</span></label>
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-sm-2">
                        <div id="reader_supplier"></div>
                        @error('suppliers_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-lg-2 col-md-3 col-sm-2">
                        <a onClick="supplier_create()" data-bs-toggle="modal"
                            data-bs-target="#exampleModalPowderCenter" style="width: 100%"
                            class="input-rounded btn btn-primary"> <i class="fa fa-plus" style="font-size:14px"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">


                <label for="finish" class="form-label font">Finish<span style="color:red">*</span></label></label>
                <select class="default-select input-rounded form-control wide mb-3 @error('finish') is-invalid @enderror"
                    aria-label="Default select example" name="finish" required>
                    <option selected disabled> -- PILIH OPSI -- </option>
                    <option value="interior"> Interior </option>
                    <option value="eksterior"> Eksterior </option>
                </select>
                @error('finish')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">


                <label for="finishing" class="form-label font">Finishing<span style="color:red">*</span></label></label>
                <select class="default-select input-rounded form-control wide mb-3 @error('finishing') is-invalid @enderror"
                    aria-label="Default select example" name="finishing" required>
                    <option selected disabled> -- PILIH OPSI-- </option>
                    <option value="SG"> SG </option>
                    <option value="MATT"> MATT </option>
                    <option value="SUPERMATT"> SUPERMATT </option>
                    <option value="GLOSS"> GLOSS </option>
                    <option value="METALLIC"> METALLIC </option>
                    <option value="SAND TEXTURE"> SAND TEXTURE </option>
                    <option value="SUBLIMASI"> SUBLIMASI </option>
                </select>
                @error('finishing')
                    <span class="text-danger">{{ $message }}</span>
                @enderror


            </div>
        </div>


    </div>

    <div class="row">
        <div class="mb-3">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-4">
                        <label for="quantity" class="form-label font">Quantity<span style="color:red">*</span></label></label>
                        <input type="number" name="quantity" class="form-control input-rounded @error('quantity') is-invalid @enderror"
                            placeholder="--INPUT--" required>
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-4">
                        <label for="tanggal_pengajuan" class="form-label font">m2<span style="color:red">*</span></label></label>
                        <input type="text" class="form-control input-rounded @error('m2') is-invalid @enderror" name="m2"
                            placeholder="--INPUT--" required>
                            @error('m2')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-4">
                        <label for="tanggal_pengajuan" class="form-label font">Estimasi m2/Kg<span style="color:red">*</span></label></label>
                        <input type="number" class="form-control input-rounded @error('estimasi') is-invalid @enderror" name="estimasi"
                            placeholder="--INPUT--" required>
                            @error('estimasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-3">
            <div class="col-lg-12">
                <div class="row">

                    <div class="col-4">
                        <label for="tanggal_pengajuan" class="form-label font">Stock Powder Fresh (Kgs)<span style="color:red">*</span></label></label>
                        <input type="number" class="form-control input-rounded @error('fresh') is-invalid @enderror" placeholder="--INPUT--"
                            name="fresh" required>
                            @error('fresh')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="col-4">
                        <label for="tanggal_pengajuan" class="form-label font">Stock Powder Recycle (Kgs)<span style="color:red">*</span></label></label>
                        <input type="number" class="form-control input-rounded @error('recycle') is-invalid @enderror" placeholder="--INPUT--"
                            name="recycle" required>
                            @error('recycle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                    <div class="col-4">
                        <label for="tanggal_pengajuan" class="form-label font">Alokasi powder Fresh<span style="color:red">*</span></label></label>
                        <input type="number" class="form-control input-rounded @error('alokasi') is-invalid @enderror" placeholder="--INPUT--"
                            name="alokasi" required>
                            @error('alokasi')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <textarea class="form-control input-rounded" id="note" placeholder="-- INPUT --" name="note"
            value="{{ old('note') }}"></textarea>

    </div>





    <button type="submit" class="btn btn-primary submit-powder">Submit</button>
</form>
