@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Purchase Request')

@section('Judul-content')
    <div class="title-page">
        Tambah Request
    </div>
@endsection

@section('content')
    @if (Session::get('success'))
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

    @endif


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
                                    <label for="type" class="form-label font">Type</label>
                                    <select name="type" id="type" readonly class="form-select input-powder"
                                        aria-label="Default select example">
                                        <option value="powder" disabled>Powder</option>
                                        <option readonly value="othergood" selected>Othergood</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="deadline_date" class="form-label">Tanggal Kebutuhan Barang</label>
                                    <input type="date"
                                        class="form-control input-powder @error('deadline_date') is-invalid @enderror"
                                        id="deadline_date" placeholder="-- INPUT --" name="deadline_date">

                                    @error('deadline_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="requester" class="form-label">Requester</label>
                                    <input type="text"
                                        class="form-control input-powder @error('requester') is-invalid @enderror"
                                        id="requester" placeholder="-- INPUT --" name="requester">

                                    @error('requester')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="requester" class="form-label">Divisi</label>
                                    <select class="custom-select input-powder d-block w-100 form-control"
                                        aria-label="Default select example" id="Prefixe" name="prefixes_id">
                                        <option selected disabled>-- Pilih Divisi --</option>
                                        @foreach ($Prefixe as $prefixe)
                                            <option value="{{ $prefixe->id }}">{{ $prefixe->divisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="project" class="form-label">Project/Customer</label>
                                    <input type="text"
                                        class="form-control input-powder @error('project') is-invalid @enderror"
                                        id="project" placeholder="-- INPUT --" name="project">

                                    @error('project')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Location">Lokasi</label>
                                    <select class="custom-select input-powder d-block w-100 form-control" id="Location"
                                        name="locations_id">
                                        <option selected disabled>-- Pilih Lokasi Pengiriman --</option>
                                        @foreach ($Location as $item)
                                            <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="Ship">Kebutuhan/ Pengiriman</label>
                                    <select class="custom-select input-powder d-block w-100 form-control" id="Ship"
                                        name="ships_id">
                                        <option selected disabled>-- Pilih Kebutuhan/ Pengiriman --</option>
                                        @foreach ($Ship as $ship)
                                            <option value="{{ $ship->id }}">{{ $ship->type }}</option>
                                        @endforeach
                                    </select>
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



                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea rows="4" cols="50" class="form-control input-powder" id="note" placeholder="-- INPUT --"
                                name="note"></textarea>

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
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_pengajuan" class="form-label font">Tanggal Pengajuan</label>
                                    <input type="date" class="form-control input-powder">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="divisi" class="form-label font">Divisi</label>
                                    <input type="text" class="form-control input-powder" placeholder="Sales">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_kedatangan" class="form-label font">Tanggal Kebutuhan Barang
                                        Tiba</label>
                                    <input type="date" class="form-control input-powder">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="requester" class="form-label font">Project/Customer</label>
                                    <input type="text" class="form-control input-powder">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_pengajuan" class="form-label font">Tanggal Kedatangan
                                        Barang</label>
                                    <input type="date" class="form-control input-powder">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="tanggal_pengajuan" class="form-label font">Approval</label>
                                    <input type="date" class="form-control input-powder">
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
                                        <label for="tanggal_pengajuan" class="form-label font">Outstanding Powder</label>
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
                                            <label for="tanggal_pengajuan" class="form-label font">Recycle Stock</label>
                                            <input type="text" class="form-control input-powder" placeholder="2">
                                        </div>

                                        <div class="col-4">
                                            <label for="tanggal_pengajuan" class="form-label font">Alokasi Fresh</label>
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
                                        <label for="tanggal_pengajuan" class="form-label font">Alokasi Outstanding</label>
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
            <div class="tab">
                <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
                <label for="tab-3" class="tab-label">Tab Three</label>
                <div class="tab-content">When I left Mr. Bates, I went down to my father: where, by the assistance of him
                    and my uncle John, and some other relations, I got forty pounds, and a promise of thirty pounds a year
                    to maintain me at Leyden: there I studied physic two years and seven months, knowing it would be useful
                    in long voyages.</div>
            </div>
        </div>
    </div>






    {{-- <div class="container col-lg-10">
        <div class="box">
            <ul class="ul-powder">
                <li class="li-powder"><a class="a-powder" href="/add">POWDER</a></li>
                <li class="li-good"><a class="a-powder" href="#news">OTHER GOOD</a></li>
            </ul>

            <div class="content">
                
            </div> --}}

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        -->
@endsection
