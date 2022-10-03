<form action="{{ route('order.orderstore') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="id_supplier" class="form-label font">Supplier</label>
                        <select class="form-select input-rounded form-control wide mb-3" name="id_supplier"
                            id="id_supplier">
                            <option selected disabled>-- Pilih Tipe --</option>
                            @foreach ($supplier as $item)
                                <option value="{{ $item->id }}">{{ $item->vendor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="divisi" class="form-label font">Atas Nama</label>
                        <input type="text" class="input-rounded form-control wide mb-3" placeholder="--INPUT--"
                            name="nama_supplier">
                    </div>
                    <div class="mb-3">
                        <label for="id_pembayaran" class="form-label">Pembayaran</label>
                        <select class="form-select input-rounded form-control wide mb-3" name="id_pembayaran">
                            <option selected disabled>-- Pilih Tipe --</option>
                            @foreach ($payment as $pemb)
                                <option value="{{ $pemb->id }}">{{ $pemb->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Waktu Pengiriman</label>
                        <div id="read_time"></div>
                    </div>
                    <div class="mb-3">
                        <label for="Location">Lokasi<span style="color:red">*</span></label>
                        <select class="form-select input-rounded form-control wide mb-3" name="id_alamat_kirim"
                            value="{{ old('id_alamat_kirim') }}">
                            <option selected disabled>-- Pilih Tipe --</option>
                            @foreach ($location as $item)
                                <option value="{{ $item->id }}">{{ ucfirst($item->location_name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="example3" class="display" style="width:100%">
                            <thead>
                                <tr class="content-control-md" align="right">
                                    <td> Pilih </td>
                                    <td width="25%" align="left">Nomor PR</td>
                                    <td width="10%">Warna</td>
                                    <td width="10%">Tipe</td>
                                    <td width="20%">Vendor</td>
                                    <td width="20%">Requester</td>
                                    <td width="15%">Divisi</td>
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

                                            <td class="content-control-sm" align="left">{{ $itex->no_pr }}</td>
                                            <td class="content-control-sm" align="left">{{ $itex->warna }}</td>
                                            <td class="content-control-sm" align="left">{{ $itex->tipe }}</td>
                                            <td class="content-control-sm" align="left">{{ $itex->vendor }}</td>
                                            <td class="content-control-sm" align="left">{{ $itex->requester }}</td>
                                            <td class="content-control-sm" align="left">{{ $itex->divisi }}</td>

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
                        <input type="text" class="form-control input-powder" name="lain-lain"
                            value="Invoice, Kwitansi, Faktur Pajak dan Surat Jalan atas nama  PT. ALLURE ALLUMINIO dengan alamat sesuai NPWP">
                    </div>
                    <div class="mb-3">
                        <label for="note" class="form-label font">Note</label>
                        <input
                            value="Harap melampirkan copy PO+surat jalan asli+Inv asli+materai pada saat penagihan (Materai Rp. 10,000 untuk transaksi diatas Rp. 5 juta)"
                            class="form-control input-powder" id="note" placeholder="-- INPUT --" name="note">

                    </div>
                    <div class="row">
                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label for="tanggal_pengajuan" class="form-label font">TTD</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">Upload</span>
                                    <div class="form-file">
                                        <input type="file"
                                            class="form-file-input form-control @error('ttd') is-invalid @enderror"
                                            id="attachment" name="signature">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_pengajuan" class="form-label font">Nama Terang</label>
                                <input type="text" class="form-control input-powder" name="nama">
                            </div>
                        </div>
                    </div>


                    <input style="width:100%" type="submit" class="btn btn-primary submit-powder" value="Submit">


                </div>
            </div>
        </div>

    </div>

</form>
