<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
{{-- <<========= Title ========>> --}}

<style>
    .cardpo {
        margin : auto;
        width: 70%;
        background-color: white;
        border:0.2px solid black;
    }

    .compagnie_logo {
        width: 50px;
        height: 50px;
    }

    .note_title {
        font-size: 13px;
        font-weight: bold;
        padding: 10px;
    }

    .note_title_text {
        font-size: 12px;
        font-weight: bold;
    }

    .note_text {
        font-size: 10px;
        padding: 5px;
    }
    .note_text_bold {
        font-size: 10px;
        padding-top: 5px;
        font-weight: bold;
    }
    .note_text_normal {
        font-size: 10px;
        padding-top: 5px;
    }

    .box1 {
        width: 100%;
        height: 20px;
        margin-top: 10px;
        background-color: #cab9e7;

    }

    /* .txt {
        padding-top: 10px;
    } */

    .card-comment {
        width: 90%;
        /* height: 40%; */
        border: 0.2px solid black;
        background-color: white;
        padding: 10px;
    }

    
    .table,
    .th{
        border: 0.2px solid black;

    }

    @media print {
        .btn {
            display: none;
        }

        .box1 {
            width: 100%;
            height: 20px;
            margin-top: 10px;
            background-color: #cab9e7 !important;
            -webkit-print-color-adjust: exact;
        }


    }
</style>



<div class="cardpo" style="margin-top: 20px">
    <div class="d-flex justify-content-center" style="padding-top: 20px">
        <div id="compagnie_logo">
            <img class="compagnie_logo" src="{{ asset('images/logo_compagnie.png') }}">
        </div>
        <p class="note_title">PT ALLURE ALUMINIO</p>
    </div>

    <hr>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-5"></div>
        <div class="col-1"></div>
        <div class="col-5">
            <p class="note_title_text">PURCHASE ORDER</p>
        </div>
    </div>
    

    <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr class="note_text">
                    <td>{{ 'Jakarta, ' . \Carbon\Carbon::parse($orders->created_at)->format('d F Y') }}</td>
                </tr>
            </table>
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr class="note_text">
                    <td>Nomor PO</td>
                    <td>{{ ': ' . $orders->no_po }}</td>
                </tr>
                {{-- @foreach ($orders->purchases as $value) --}}
                <tr class="note_text">
                    <td>Nomor PR</td>
                    <td style="font-size:9px">{{ ': ' . $orders->purchases->get(0)->no_pr }}</td>
                </tr>
                {{-- @endforeach --}}
                @if($orders->tanggal_kirim != NULL)
                <tr class="note_text">
                    <td>Tanggal Kirim</td>
                    <td>{{ ': ' . $orders->tanggal_kirim }}</td>
                </tr>
                @else
                <tr class="note_text">
                    <td>Dikirim</td>
                    <td>{{ ': ' . $orders->timeshipping->name_time }}</td>
                </tr>
                @endif
                <tr class="note_text">
                    <td width="50px">Payment</td>
                    <td>{{ ': ' . $orders->payment->name_payment }}</td>
                </tr>
            </table>
                
            </div>
    </div>


    <div class="box1">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 txt">
                <table>
                    <tr class="note_text_bold">
                        <td>Purchasing For : </td>
                    </tr>
                </table>
            </div>
            <div class="col-1"></div>
            <div class="col-4 txt">
                <table>
                    <tr class="note_text_bold">
                        <td>Ship to :</td>
                    </tr>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
            <div class="col-5">
                <p class="note_text_bold">{{ $orders->supplier->vendor }}</p>
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <table>
                    <tr>
                        <td class="note_text_bold">{{ $orders->location->location_name }}</td>
                    </tr>
                    <tr>
                        <td class="note_text_normal" style="text-align: justify">{{ $orders->location->address }}</td>
                    </tr>
                </table>
            </div>
            <div class="col-1"></div>
    </div>

    <div class="box1">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5 txt">
            </div>
            <div class="col-1"></div>
            <div class="col-4 txt">
                <table>
                    <tr class="note_text_bold">
                        <td>Billing Address :</td>
                    </tr>
                </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>

        <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr>
                    <td class="note_text_normal"> Yth. Bapak/ Ibu {{ $orders->nama_supplier }} </td>
                </tr>
                <tr>
                    <td style="font-size:10px">Di tempat</td>
                </tr>
                <tr>
                    <td style="font-size:10px"> <br>Dengan Hormat,</td>
                </tr>
                <tr>
                    <td style="font-size:10px">Bersama ini kami order material sebagai berikut:</td>
                </tr>
            </table>
        </div>
        <div class="col-1"></div>
        <div class="col-4">
            <table>
                <tr>
                    <td class="note_text_bold">PT Allure Aluminio</td>
                </tr>
                <tr>
                    <td class="note_text_normal" style="text-align: justify">{{ $orders->alamat_penagihan }}</td>
                </tr>
            </table>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            @foreach ($purchase as $tipe)
            @if ($loop->first)
                @if ($tipe->type == 'othergood')
                <br>
                    <table class="table" style="box-shadow: none">

                        <thead>

                            <tr style="background-color:#cab9e7;  text-align:center; font-weight:bold; font-size:10px">
                                <td>No.</td>
                                <td>Deskripsi</td>
                                <td>Quantity</td>
                                <td>Satuan Barang</td>
                            </tr>
                        </thead>
                        @php
                            $nomor = 1;
                        @endphp
                        <tbody>
                            @foreach ($tracking as $purchase_requests)
                                <tr scope="row" style="text-align: center; font-size:10px">
                                    <th scope="col">{{ $nomor++ }}</th>
                                    <td scope="col">{{ $purchase_requests->item_name }}</td>
                                    <td scope="col">{{ $purchase_requests->outstanding }}</td>
                                    <td scope="col">{{ $purchase_requests->unit }}</td>
                            @endforeach
                        </tbody>

                    </table>
                    
                @elseif ($purchase->get(0)->type == 'powder')
                <br>
                    <table class="table table-bordered" style="box-shadow: none">

                        <thead>

                            <tr style="background-color:#cab9e7;  text-align:center; font-weight:bold;font-size:10px">
                            
                                <td>Grade</td>
                                <td>Warna</td>
                                <td>Kode</td>
                                <td>Qty</td>
                                <td>m2</td>
                            </tr>
                        </thead>
                        @php
                            $nomor = 1;
                        @endphp
                        <tbody> 
                            @foreach ($powders as $purchase_requests)
                                <tr scope="row" style="text-align: center;font-size:10px">
                                    <td scope="col">{{ $purchase_requests->tipe }}</td>
                                    <td scope="col">{{ $purchase_requests->warna }}</td>
                                    <td scope="col">{{ $purchase_requests->name }}</td>
                                    <td scope="col">{{ $purchase_requests->quantity }}</td>
                                    <td scope="col">{{ $purchase_requests->m2 }}</td>
                            @endforeach
                        </tbody>

                    </table>
                @endif
                @endif
        @endforeach
        </div>
        <div class="col-1"></div>
    </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-5">
                <table class="table  table-bordered border-dark" 
                    style="border-radius: none; box-shadow:none; border:0.2px solid black">

                    <tr scope="row">
                        <th class="note_text_bold">Comments or Special Intructions</th>
                    </tr>
                    <tr>
                        <td class="note_text_normal">{{ $orders->lain_lain }}
                            <br><br>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="col-1"></div>
            <div class="col-4">
                <div class="d-flex justify-content-center">
                    <div class="signature">

                        <p class="note_text_normal">Mengetahui,</p>
                        <img src="{{ asset('storage/' . $orders->signature) }}" style="width:60px; height:60px">
                        <p class="note_text_normal">{{ $orders->nama }}</p>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>

        </div>
        {{-- <div class="row" style="margin-top: 60px">

            <div class="col-6 border-dark">
                
                

            </div>
            <div class="col-2"></div>
            <div class="col-4" style="margin-top: 50px">
                
            </div>
        </div> --}}

        <hr>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <table style="margin-bottom: 20px">
                <tr class="note_text_bold">
                    <td>{{ $orders->note }}</td>
                </tr>
            </table>
            </div>
            <div class="col-1"></div>
        </div>
    </div>


    <br>
    <div class="d-flex justify-content-center">
        <a style="width:70%; margin-bottom:30px" class="btn btn-danger" onclick="window.print();">Export PDF</a>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
