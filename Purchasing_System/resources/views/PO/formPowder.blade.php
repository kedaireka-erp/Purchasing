<form action="{{ route('order.orderstore') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="id_supplier" class="form-label font">Supplier<span style="color:red">*</span></label>
                        <div class="row">
                            <div class="col-lg-8">
                                <div id="read_supplier_po"></div>
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
                            name="nama_supplier"  required>
                    </div>
                    <div class="mb-3">
                        <label for="id_pembayaran" class="form-label">Pembayaran<span style="color:red">*</span></label>
                        <div class="row">
                            <div class="col-lg-8">
                                <div id="read_payment_po"></div>
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
                        <div id="read_time"></div>
                    </div>
                    <div class="mb-3">
                        <label for="Location">Lokasi<span style="color:red">*</span></label>
                        <div class="row">
                            <div class="col-lg-8">
                                <div id="read_location_po"></div>
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
                                    <td> Pilih<span style="color:red">*</span> </td>
                                    <td class="content-control-md" width="25%" align="left">Nomor PR</td>
                                    <td class="content-control-md" width="10%">Warna</td>
                                    <td class="content-control-md" width="10%">Lokasi</td>
                                    <td class="content-control-md" width="20%">Vendor</td>
                                    <td class="content-control-md" width="20%">Requester</td>
                                    <td class="content-control-md" width="15%">Divisi</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($powders as $no => $itex)
                                    @if ($itex->accept_status == 'accept' || $itex->accept_status == 'edit')
                                        <tr align="right">
                                            <td align="center">

                                                <input type="checkbox" name="ids[{{ $itex->id }}]"
                                                    value="{{ $itex->id }}" class="form-check-input"
                                                    id="customCheckBox2">

                                            </td>

                                            <td class="content-control-sm">{{ $itex->no_pr }}</td>
                                            <td class="content-control-sm">{{ $itex->warna }}</td>
                                            <td class="content-control-sm">{{ $itex->location_name }}</td>
                                            <td class="content-control-sm">{{ $itex->vendor }}</td>
                                            <td class="content-control-sm">{{ $itex->requester }}</td>
                                            <td class="content-control-sm">{{ $itex->divisi }}</td>

                                        </tr>
                                    @endif
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
