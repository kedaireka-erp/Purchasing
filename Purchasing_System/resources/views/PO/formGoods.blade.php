<form action="{{ route('order.orderstore') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">

                    <div class="mb-3">
                        <label for="tanggal_pengajuan" class="form-label font">Supplier</label>
                        <input type="text" class="input-rounded form-control wide mb-3" placeholder="--INPUT--"
                            name="supplier">
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
                        <select class="form-select input-rounded form-control wide mb-3" name="id_waktu">
                            <option selected disabled>-- Pilih Tipe --</option>
                            @foreach ($time as $it)
                                <option value="{{ $it->id }}">{{ $it->name }}
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
                                <tr align="right">
                                    {{-- <td align="center">
                                        <div class="form-check custom-checkbox ms-2">
                                            <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </td> --}}
                                    <td> Pilih </td>
                                    <td align="left">Nomor PR</td>
                                    <td>Nama Barang</td>
                                    <td>Quantity</td>
                                    <td>Unit</td>
                                    <td>Requester</td>
                                    <td>Divisi</td>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($items as $no => $item)
                                    <tr align="right">
                                        <td align="center">

                                            <input type="checkbox" name="ids[{{ $item->id }}]"
                                                value="{{ $item->id }}" class="form-check-input"
                                                id="customCheckBox2">

                                        </td>
                                        <td class="content-control" align="left">{{ $item->no_pr }}</td>
                                        <td class="content-control" align="left">{{ $item->item_name }}</td>
                                        <td class="content-control" align="left">{{ $item->stok }}</td>
                                        <td class="content-control" align="left">{{ $item->name }}</td>
                                        <td class="content-control" align="left">{{ $item->requester }}</td>
                                        <td class="content-control" align="left">{{ $item->divisi }}</td>

                                    </tr>
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
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_pengajuan" class="form-label font">Alamat Penagihan</label>
                                <input type="textarea" class="form-control input-powder" name="alamat_penagihan">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="tanggal_pengajuan" class="form-label font">Lain-Lain</label>
                                <input type="textarea" class="form-control input-powder" name="lain-lain">
                            </div>
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="note" class="form-label font">Note</label>
                        <textarea rows="4" cols="50" class="form-control input-powder" id="note" placeholder="-- INPUT --"
                            name="note"></textarea>

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


                    <input type="submit" class="btn btn-primary submit-powder" value="Submit">


                </div>
            </div>
        </div>

    </div>

</form>
