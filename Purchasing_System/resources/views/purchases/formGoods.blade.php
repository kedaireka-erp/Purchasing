<form action="{{ route('purchase_request.storegood') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="type" class="form-label font">Type<span style="color:red">*</span></label>
                <input readonly name="type" id="type" class="form-control input-rounded form-control-lg"
                    value="othergood" selected>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="deadline_date" class="form-label">Tanggal
                    Kebutuhan Barang<span style="color:red">*</span></label>
                <input type="date"
                    class="form-control input-rounded form-control-lg @error('deadline_date') is-invalid @enderror"
                    id="deadline_date" placeholder="-- INPUT --" name="deadline_date"
                    value="{{ old('deadline_date') }}">

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
                <input type="text"
                    class="form-control input-rounded form-control-lg @error('requester') is-invalid @enderror"
                    id="requester" placeholder="-- INPUT --" name="requester" value="{{ old('requester') }}" autofocus>

                @error('requester')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3">
                <label for="prefixes_id" class="form-label">Divisi<span style="color:red">*</span></label>
                <select class="default-select input-rounded form-control wide mb-3" aria-label="Default select example"
                    id="Prefixe" name="prefixes_id" value="{{ old('prefixes_id') }}">
                    <option selected disabled>-- Pilih Divisi --</option>
                    @foreach ($Prefixe as $prefixe)
                        <option value="{{ $prefixe->id }}">{{ $prefixe->divisi }}</option>
                    @endforeach
                </select>
                @error('prefixes_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="project" class="form-label">Project/Customer</label>
                <input type="text"
                    class="form-control input-rounded form-control-lg @error('project') is-invalid @enderror"
                    id="project" placeholder="-- INPUT --" name="project" value="{{ old('project') }}">

                @error('project')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="Location">Lokasi<span style="color:red">*</span></label>
                <select class="default-select input-rounded form-control wide mb-3" id="Location" name="locations_id"
                    value="{{ old('locations_id') }}">
                    <option selected disabled>-- Pilih Lokasi
                        Pengiriman --</option>
                    @foreach ($Location as $item)
                        <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}
                        </option>
                    @endforeach
                </select>
                @error('locations_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <label for="Ship">Kebutuhan/ Pengiriman<span style="color:red">*</span></label>
                <select class="default-select input-rounded form-control wide mb-3" id="Ship" name="ships_id"
                    value="{{ old('ships_id') }}">
                    <option selected disabled>--
                        Pilih Kebutuhan/
                        Pengiriman --</option>

                    @foreach ($Ship as $ship)
                        <option value="{{ $ship->id }}">{{ $ship->type }}</option>
                    @endforeach
                </select>
                @error('ships_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="basic-form custom_file_input">

                <label for="attachment" class="form-label">Attachment</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text">Upload</span>
                    <div class="form-file">
                        <input type="file"
                            class="form-file-input form-control @error('attachment') is-invalid @enderror"
                            id="attachment" placeholder="Attachment" name="attachment">
                    </div>
                </div>


            </div>
        </div>
        <div class="card">
            <div class="card-header" style="background-color:#cab9e7">
                <strong> Tambah barang </strong>
            </div>
            <div class="card-body" style="background-color: #f7f4f4">
                <div class="container">

                    <div id="dynamicAddRemove">

                        <div class="row">

                            <div class="col-5">
                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                <select class="default-select input-rounded form-control wide mb-3"
                                    aria-label="Default select example" name="addMoreInputFields[0][id_master_item]">
                                    <option selected disabled>-- Pilih Barang --</option>
                                    @foreach ($master_item as $item)
                                        <option value="{{ $item->id }}">{{ ucfirst($item->item_name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="addMoreInputFields[0][stok]" placeholder="qty"
                                    class="form-control input-rounded form-control-lg" />
                            </div>

                            <div class="col-3">
                                <label for="satuan" class="form-label">Satuan</label>
                                <select class="default-select input-rounded form-control wide mb-3"
                                    aria-label="Default select example" name="addMoreInputFields[0][id_satuan]">
                                    <option selected disabled>-- Pilih Satuan --</option>
                                    @foreach ($satuan as $sat)
                                        <option value="{{ $sat->id }}">{{ ucfirst($sat->unit) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="quantity" class="form-label">Aksi</label>
                                <button type="button" name="add" id="dynamic-ar"
                                    class="btn btn-outline-primary">+</button>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
        {{-- Start --}}

        {{-- End --}}
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control input-rounded" id="note1" placeholder="-- INPUT --" name="note"
                value="{{ old('note') }}"></textarea>

        </div>


        <button class="btn btn-primary" type="submit" style="margin-top:20px">Submit</button>


</form>
