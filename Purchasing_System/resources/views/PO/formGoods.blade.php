<form action="{{ route('order.orderstore') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="id_supplier" class="form-label font">Supplier<span style="color:red">*</span></label>
                        <div class="row">
                            <div class="col-lg-8">
                                <div id="reader_supplier_po"></div>
                            </div>
                            <div class="col-lg-4">
                                <a onClick="supplier_po_create()" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalPOCenter" style="width: 100%"
                                    class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                        style="font-size:14px"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="divisi" class="form-label font">Atas Nama<span style="color:red">*</span></label>
                        <input type="text" class="input-rounded form-control wide mb-3" placeholder="--INPUT--"
                            name="nama_supplier" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_pembayaran" class="form-label">Pembayaran<span style="color:red">*</span></label>
                        <div class="row">
                            <div class="col-lg-8">
                                <div id="reader_payment_po"></div>
                            </div>
                            <div class="col-lg-4">
                                <a onClick="payment_po_create()" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalPOCenter" style="width: 100%"
                                    class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                        style="font-size:14px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Waktu Pengiriman<span style="color:red">*</span></label>
                        <div id="reader_time"></div>
                    </div>
                    <div class="mb-3">
                        <label for="Location">Lokasi<span style="color:red">*</span></label>
                        <div class="row">
                            <div class="col-lg-8">
                                <div id="reader_location_po"></div>
                            </div>
                            <div class="col-lg-4">
                                <a onClick="location_po_create()" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalPOCenter" style="width: 100%"
                                    class="input-rounded btn btn-primary"> <i class="fa fa-plus"
                                        style="font-size:14px"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example3" class="display" style="width:100%">
                            <thead>
                                <tr class="content-control-md" align="right">
                                    <td class="content-control-md"> Pilih<span style="color:red">*</span> </td>
                                    <td class="content-control-md" align="left">Nomor PR</td>
                                    <td class="content-control-md">Lokasi</td>
                                    <td class="content-control-md">Nama Barang</td>
                                    <td class="content-control-md">Quantity</td>
                                    <td class="content-control-md">Unit</td>
                                    <td class="content-control-md">Requester</td>
                                    <td class="content-control-md">Divisi</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $no => $item)
                                    {{-- @if ($item->accept_status != 'pending' || $item->accept_status != 'reject') --}}
                                        <tr align="right">
                                            <td align="center">

                                                <input type="checkbox" name="ids[{{ $item->id }}]"
                                                    value="{{ $item->id }}" class="form-check-input"
                                                    id="customCheckBox2">

                                            </td>
                                            <td class="content-control-sm" align="left">{{ $item->no_pr }}</td>
                                            <td class="content-control-sm" align="left">{{ $item->location_name }}
                                            </td>
                                            <td class="content-control-sm" align="left">{{ $item->item_name }}
                                            </td>
                                            <td class="content-control-sm" align="left">{{ $item->stok }}</td>
                                            <td class="content-control-sm" align="left">{{ $item->name }}</td>
                                            <td class="content-control-sm" align="left">{{ $item->requester }}
                                            </td>
                                            <td class="content-control-sm" align="left">{{ $item->divisi }}</td>

                                        </tr>
                                    {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </div>


        <div class="card">
            <div class="card-body">
                <div class="content">

                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="tanggal_pengajuan" class="form-label font">Alamat Penagihan</label>
                            <input
                                value="Kantor PT. Allure Alluminio, Rukan Artha Gading Niaga Blok B No. 17, Kelapa Gading, Jakarta Utara"
                                type="text" class="form-control input-powder" name="alamat_penagihan">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pengajuan" class="form-label font">Lain-Lain</label>
                        <input type="text" class="form-control input-powder" name="lain_lain"
                            value="Invoice, Kwitansi, Faktur Pajak dan Surat Jalan atas nama  PT. ALLURE ALLUMINIO dengan alamat sesuai NPWP">
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label font">Note</label>
                        <input
                            value="Harap melampirkan copy PO+surat jalan asli+Inv asli+materai pada saat penagihan (Materai Rp. 10,000 untuk transaksi diatas Rp. 5 juta)"
                            class="form-control input-powder" id="note" placeholder="-- INPUT --"
                            name="note">

                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label for="tanggal_pengajuan" class="form-label font">TTD<span style="color:red">*</span></label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">Upload</span>
                                    <div class="form-file">
                                        <input type="file"
                                            class="form-file-input form-control @error('ttd') is-invalid @enderror"
                                            id="attachment" name="signature" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_pengajuan" class="form-label font">Nama Terang<span style="color:red">*</span></label>
                                <input type="text" class="form-control input-powder" name="nama" required>
                            </div>
                        </div>
                    </div>


                    <input style="width:100%" type="submit" class="btn btn-primary submit-powder" value="Submit">


                </div>
            </div>
        </div>

    </div>

</form>
