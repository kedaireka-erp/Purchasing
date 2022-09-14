@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

@section('Judul-content')
    <div class="title-page">
        Tambah Request
    </div>
@endsection

@section('content')
    {{-- @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif --}}


    <div class="wrapper">
        <div class="tabs">
            <div class="tab">
                <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
                <label for="tab-1" class="tab-label">Other Good</label>
                <div class="tab-content">
                    <form action="{{ route('purchase_request.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label font">Type<span
                                            style="color:red">*</span></label>
                                    <input readonly name="type" id="type" class="form-control" value="othergood"
                                        selected>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="deadline_date" class="form-label">Tanggal
                                        Kebutuhan Barang<span style="color:red">*</span></label>
                                    <input type="date"
                                        class="form-control input-powder @error('deadline_date') is-invalid @enderror"
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
                                    <label for="requester" class="form-label">Requester<span
                                            style="color:red">*</span></label>
                                    <input type="text"
                                        class="form-control input-powder @error('requester') is-invalid @enderror"
                                        id="requester" placeholder="-- INPUT --" name="requester"
                                        value="{{ old('requester') }}" autofocus>

                                    @error('requester')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="prefixes_id" class="form-label">Divisi<span
                                            style="color:red">*</span></label>
                                    <select class="custom-select input-powder d-block w-100 form-control"
                                        aria-label="Default select example" id="Prefixe" name="prefixes_id"
                                        value="{{ old('prefixes_id') }}">
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
                                        class="form-control input-powder @error('project') is-invalid @enderror"
                                        id="project" placeholder="-- INPUT --" name="project"
                                        value="{{ old('project') }}">

                                    @error('project')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Location">Lokasi<span style="color:red">*</span></label>
                                    <select class="custom-select input-powder d-block w-100 form-control" id="Location"
                                        name="locations_id" value="{{ old('locations_id') }}">
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
                                    <select class="custom-select input-powder d-block w-100 form-control" id="Ship"
                                        name="ships_id" value="{{ old('ships_id') }}">
                                        <option selected disabled ">--
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
                                <div class="mb-3">
                                    <label for="attachment" class="form-label">Attachment</label>
                                    <input type="file"
                                        class="form-control input-powder @error('attachment') is-invalid @enderror"
                                        id="attachment" placeholder="Attachment" name="attachment">
                                    {{-- <div class="mb-3">
                            <label for="formFile" class="form-label">Images</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                          </div> --}}

                                    @error('attachment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" style="background-color: lightgrey">
                              <strong> Tambah barang </strong>
                            </div>
                            <div class="card-body bg-light">
                                <div class="container">
                            
                                    <div id="dynamicAddRemove">
                
                                        <div class="row">
                
                                            <div class="col-5">
                                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="addMoreInputFields[0][id_master_item]">
                                                    <option selected disabled>-- Pilih Barang --</option>
                                                    @foreach ($master_item as $item)
                                                        <option value="{{ $item->id }}">{{ ucfirst($item->item_name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                
                                            <div class="col-2">
                                                <label for="quantity" class="form-label">Quantity</label>
                                                <input type="text" name="addMoreInputFields[0][stok]" placeholder="qty"
                                                    class="formulir-control" />
                                            </div>
                
                                            <div class="col-3">
                                                <label for="satuan" class="form-label">Satuan</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="addMoreInputFields[0][id_satuan]">
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
                            <textarea rows="4" cols="50" class="form-control input-powder" id="note" placeholder="-- INPUT --"
                                name="note" value="{{ old('note') }}""></textarea>

                        </div>


                        <button class="btn btn-primary" type="submit">Submit</button>


                    </form>
                </div>
            </div>
            <div class="tab">
                <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                <label for="tab-2" class="tab-label">Powder</label>
                <div class="tab-content">
                    <form>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="type" class="form-label font">Type<span
                                            style="color:red">*</span></label>
                                    <input readonly name="type" id="type" class="form-control" value="powder"
                                        selected>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="deadline_date" class="form-label">Tanggal
                                        Kebutuhan Barang<span style="color:red">*</span></label>
                                    <input type="date"
                                        class="form-control input-powder @error('deadline_date') is-invalid @enderror"
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
                                    <label for="requester" class="form-label">Requester<span
                                            style="color:red">*</span></label>
                                    <input type="text"
                                        class="form-control input-powder @error('requester') is-invalid @enderror"
                                        id="requester" placeholder="-- INPUT --" name="requester"
                                        value="{{ old('requester') }}" autofocus>

                                    @error('requester')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="prefixes_id" class="form-label">Divisi<span
                                            style="color:red">*</span></label>
                                    <select class="custom-select input-powder d-block w-100 form-control"
                                        aria-label="Default select example" id="Prefixe" name="prefixes_id"
                                        value="{{ old('prefixes_id') }}">
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
                                        class="form-control input-powder @error('project') is-invalid @enderror"
                                        id="project" placeholder="-- INPUT --" name="project"
                                        value="{{ old('project') }}">

                                    @error('project')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Location">Lokasi<span style="color:red">*</span></label>
                                    <select class="custom-select input-powder d-block w-100 form-control" id="Location"
                                        name="locations_id" value="{{ old('locations_id') }}">
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
                                    <select class="custom-select input-powder d-block w-100 form-control" id="Ship"
                                        name="ships_id" value="{{ old('ships_id') }}">
                                        <option selected disabled ">--
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
                                <div class="mb-3">
                                    <label for="attachment" class="form-label">Attachment</label>
                                    <input type="file"
                                        class="form-control input-powder @error('attachment') is-invalid @enderror"
                                        id="attachment" placeholder="Attachment" name="attachment">
                                    {{-- <div class="mb-3">
                            <label for="formFile" class="form-label">Images</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                          </div> --}}

                                    @error('attachment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_pengajuan" class="form-label font">Requester</label>
                                    <input type="text" class="form-control input-powder">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_pengajuan" class="form-label font">Kebutuhan</label>
                                    <input type="text" class="form-control input-powder">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_pengajuan" class="form-label font">warna</label>
                                    <input type="text" class="form-control input-powder">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_pengajuan" class="form-label font">Kode Warna</label>
                                    <input type="text" class="form-control input-powder">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="kode_warna" class="form-label font">Grade</label>
                                    <input type="text" class="form-control input-powder">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="finish" class="form-label font">Finish</label>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control input-powder">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control input-powder">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="tanggal_pengajuan" class="form-label font">Supplier</label>
                                        <input type="text" class="form-control input-powder" placeholder="AXALTA">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="tanggal_pengajuan" class="form-label font">Qty</label>
                                            <input type="text" class="form-control input-powder" placeholder="Kg">
                                        </div>
                                        <div class="col-4">
                                            <label for="tanggal_pengajuan" class="form-label font">m2</label>
                                            <input type="text" class="form-control input-powder" placeholder="m2">
                                        </div>
                                        <div class="col-4">
                                            <label for="tanggal_pengajuan" class="form-label font">Estimasi</label>
                                            <input type="text" class="form-control input-powder" placeholder="Kgs/m2">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="tanggal_pengajuan" class="form-label font">Outstanding
                                            Powder</label>
                                        <input type="text" class="form-control input-powder" placeholder="10">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="tanggal_pengajuan" class="form-label font">Fresh Stock</label>
                                            <input type="text" class="form-control input-powder" placeholder="2">
                                        </div>

                                        <div class="col-4">
                                            <label for="tanggal_pengajuan" class="form-label font">Recycle
                                                Stock</label>
                                            <input type="text" class="form-control input-powder" placeholder="2">
                                        </div>

                                        <div class="col-4">
                                            <label for="tanggal_pengajuan" class="form-label font">Alokasi
                                                Fresh</label>
                                            <input type="text" class="form-control input-powder" placeholder="2">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tanggal_pengajuan" class="form-label font">Status</label>
                                        <input type="text" class="form-control input-powder"
                                            placeholder="Outstanding">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tanggal_pengajuan" class="form-label font">Alokasi
                                            Outstanding</label>
                                        <input type="text" class="form-control input-powder" placeholder="10">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tanggal_pengajuan" class="form-label font">Attachments</label>
                                        <input type="file" class="form-control input-powder">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="tanggal_pengajuan" class="form-label font">Note</label>
                                        <textarea type="text" class="form-control input-powder" placeholder="Tidak ada catatan"
                                            style="font-style:italic"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="Type" class="form-label font">Type</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected disabled>Pilih Type</option>
                                                <option value="1">Powder</option>
                                                <option value="2">Othergood</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary submit-powder">Submit</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>






    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<dr><div id="dynamicAddRemove" style="margin-top:6px"> <div class="row"> <div class="col-5"> <select class="form-select" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_master_item]"> <option selected disabled>-- Pilih Barang --</option> @foreach ($master_item as $item)<option value="{{ $item->id }}">{{ ucfirst($item->item_name) }}</option> @endforeach </select> </div><div class="col-2"> <input type="text" name="addMoreInputFields[' + i + '][stok]" placeholder="qty" class ="formulir-control" / > </div><div class="col-3"><select class="form-select" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_satuan]"> <option selected disabled>-- Pilih Satuan --</option> @foreach ($satuan as $sat) <option value="{{ $sat->id }}">{{ ucfirst($sat->unit) }} </option> @endforeach </select></div><div class="d-flex justify-content-center col-2"> <button type="button" class="btn btn-outline-danger remove-input-field">-</button></div><div></div></dr>'
            );
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('dr').remove();
        });
    </script>
@endsection
