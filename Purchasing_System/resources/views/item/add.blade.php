@extends('layout.sidebar')

@section('judul-laman', 'Dashboard Master Prefix')

@section('Judul-content')
    <div class="d-flex justify-content-between">

        <div class="title-page">
            Tambah Item Purchasing Request
        </div>
        <a href="/purchase_request" type="button" class="btn-close" aria-label="Close"></a>
    </div>

@endsection

@section('content')

    <div class="container">
        <div class="viewpr">
            <div id="header">
                <div class="row">

                    <div class="col-6" style="margin-top: 10px">
                        <div class="row">
                            <div class="col-3">
                                <img class="logo_pr" src="{{ asset('images/logo_compagnie.png') }}">
                            </div>
                            <div class="col-9">
                                <span class="text_pr">PT. ALLURE ALLUMINIO</span>
                                <p class="subtext_pr">Jakarta</p>
                                <p class="subtext_pr">Telp: (021) 45850530</p>
                                {{-- <span class="subtext_pr">Telp: (021) 45850530 </span> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-2"></div>

                    <div class="col-4">
                        <span class="bold"> Purchase Request </span>
                        <p class="text_pr">No: {{ $purchase_requests->no_pr }}</p>
                        <table style="margin-top: 20px " class="subhead_pr">
                            <tr>
                                <td>Pengajuan</td>
                                <td>: {{ \Carbon\Carbon::parse($purchase_requests->created_at)->format('d F Y') }}</td>
                            </tr>
                            <br>
                            <tr>
                                <td width="80px">Deadline</td>
                                <td>: {{ \Carbon\Carbon::parse($purchase_requests->deadline_date)->format('d F Y') }}</td>
                            </tr>
                            <br>
                            <tr>
                                <td width="80px">Alamat</td>
                                <td>: {{ $purchase_requests->location->location_name }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>


            <table class="table table-striped" id="body">
                <thead>
                    <tr style="text-align: center">
                        <th scope="col">ID PR </th>
                        <th scope="col">Description of Goods</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @php
                    $nomor = 1;
                @endphp
                <tbody>
                    @foreach ($item as $no => $yes)
                    <tr style="text-align: center">
                        @if ($yes->id_request == $purchase_requests->id)
                        <td>{{ $yes->id_request }}</td>
                        <td>{{ $yes->item_name }}</td>
                        <td>{{ $yes->stok }}</td>
                        <td>{{ $yes->unit }}</td>
                        <td class="d-flex justify-content-center">


                            <form method="GET" action="/"
                                style="margin-right:4px">
                                @csrf
                                <input type="hidden" value="EDIT" name="_method">
                                <button type="submit" class="btn btn-warning" id="edit"> <i
                                        class="fa fa-edit"></i> </button>
                            </form>



                            <form method="POST" onsubmit="return confirm('Move data to trash?')"
                                action="/">
                                @csrf
                                <input type="hidden" value="DELETE" name="_method">
                                <button type="submit" class="btn btn-danger" id="delete"> <i
                                        class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                
                </tbody>
            </table>


            <div class="container">
                <form action="{{ route('purchase_request.storeplus', $purchase_requests->id ) }}" method="POST">
                    @csrf

                    <div id="dynamicAddRemove">

                        <div class="row">

                            <div class="col-2">
                                <input readonly class="form-control" name="addMoreInputFields[0][id_request]" type="text" value="{{ $purchase_requests->id }}" selected>
                            </div>

                            <div class="col-4">
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
                                <input type="text" name="addMoreInputFields[0][stok]" placeholder="qty"
                                    class="formulir-control" />
                            </div>

                            <div class="col-2">
                                <select class="form-select" aria-label="Default select example"
                                    name="addMoreInputFields[0][id_satuan]">
                                    <option selected disabled>-- Pilih Satuan --</option>
                                    @foreach ($satuan as $sat)
                                        <option value="{{ $sat->id }}">{{ ucfirst($sat->unit) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="d-flex justify-content-center col-2">
                                <button type="button" name="add" id="dynamic-ar"
                                    class="btn btn-outline-primary">+</button>
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-outline-success btn-block mt-3">Save</button>
                </form>
            </div>

            <div id="footer" style="margin-top: 80px">
                <hr>
                <div class="row">
                    <div class="col-6">
                        <p class="subhead_pr">Project/Customer : {{ $purchase_requests->project }}</p>
                        <p class="subhead_pr" style="margin-top: 130px">Kebutuhan/Pengiriman : <span
                                style="font-weight: bold">{{ $purchase_requests->Ship->type }}</span></p>
                        <p class="subhead_pr">Note : {{ $purchase_requests->note }} </p>
                    </div>
                    <div class="col-1"></div>

                    <div class="col-5" align="center">
                        <p class="subhead_pr">Requester/Divisi : {{ $purchase_requests->requester }}/
                            {{ $purchase_requests->Prefixe->divisi }} </p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="orange"
                            class="bi bi-pause-circle-fill" viewBox="0 0 16 16"style="margin-top:45px">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.25 5C5.56 5 5 5.56 5 6.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C7.5 5.56 6.94 5 6.25 5zm3.5 0c-.69 0-1.25.56-1.25 1.25v3.5a1.25 1.25 0 1 0 2.5 0v-3.5C11 5.56 10.44 5 9.75 5z" />
                        </svg>
                        <p class="subhead_pr" style="margin-top:15px">Status Approval : <span
                                style="font-weight: bold">{{ $purchase_requests->approval_status }}</span></p>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div style="margin-top:100px"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i = 0;
        $("#dynamic-ar").click(function() {
            ++i;
            $("#dynamicAddRemove").append(
                '<dr><div id="dynamicAddRemove" style="margin-top:6px"> <div class="row"> <div class="col-2"><input class="form-control" name="addMoreInputFields[' + i + '][id_request]" type="text" value="{{ $purchase_requests->id }}" selected></div> <div class="col-4"> <select class="form-select" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_master_item]"> <option selected disabled>-- Pilih Barang --</option> @foreach ($master_item as $item)<option value="{{ $item->id }}">{{ ucfirst($item->item_name) }}</option> @endforeach </select> </div><div class="col-2"> <input type="text" name="addMoreInputFields[' + i + '][quantity]" placeholder="qty" class ="formulir-control" / > </div><div class="col-2"><select class="form-select" aria-label="Default select example" name="addMoreInputFields[' + i + '][id_satuan]"> <option selected disabled>-- Pilih Satuan --</option> @foreach ($satuan as $sat) <option value="{{ $sat->id }}">{{ ucfirst($sat->unit) }} </option> @endforeach </select></div><div class="d-flex justify-content-center col-2"> <button type="button" class="btn btn-outline-danger remove-input-field">-</button></div><div></div></dr>'
            );
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('dr').remove();
        });
    </script>
@endsection
