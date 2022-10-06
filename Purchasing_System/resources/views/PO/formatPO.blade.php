<x-style></x-style>

<style>
    .cardpo{
      width: 100%;
      margin: auto;
      background-color: white;
      padding: 15px;
    }
    img{
        width: 70px;
        height: 70px;
    }
    .box1{
        width: 100%;
        height: 40px;
        background-color: #cab9e7;
    
    }
    .txt{
        padding: 10px;
    }
    .card-comment{
        width: 90%;
        /* height: 40%; */
        border: 2px solid black;
        background-color: white;
        padding: 10px;
    }
    hr{
        background-color: black;
    }
    .table, .th, .td {
  border: 1px solid black;
  border-collapse: collapse;
}
  
    </style>

@section('content')

<div class="cardpo">
    <a class="btn btn-danger" onclick="window.print();">Export PDF</a>
    <div class="d-flex justify-content-center" style="margin-top: 20px">
      <div class="d-flex">
        <div>
          <img src="{{ asset('images/logo_compagnie.png') }}">
        </div>
        <div class="d-flex align-items-center">
          <h3>PT ALLURE ALUMINIO</h3>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-5" style="margin-top: 15px">
 
                    <p>{{ 'Jakarta, '.\Carbon\Carbon::parse($orders->created_at)->format('d F Y') }}</p>
        </div>

        <div class="col-6" style="margin-top:-65px" >

            <table class="subhead_pr">
                <tr>
                    <td><h3 style="white-space: nowrap">PURCHASE REQUEST</h3></td>
                </tr>
                <br>
                <tr>
                    <td>Nomor PO</td>
                    <td>{{ ': '.$orders->no_po }}</td>
                </tr>
                <br>
                <tr>@foreach($tracking as $value)
                    @if ($loop->first)
                    <td width="80px">Nomor PR</td>
                    <td>{{ ': '.$value->no_pr }}</td>
                </tr>
                <br>
                <tr>
                    <td width="80px">Waktu Pengiriman</td>
                    <td>{{ ': '.$value->deadline_date}}</td>
                    @endif
                    
                </tr>@endforeach
                <br>
                <tr>
                    <td width="80px">Pembayaran</td>
                    <td>{{ ': '.$orders->payment->name_payment}}</td>
                </tr>
            </table>
            

        </div>
    </div>


<div class="box1" style="margin-top: 40px">
    <div class="row" >
        <div class="col-1"></div>
        <div class="col-5 txt" >
            <strong>Purchasing From : </strong>
        </div>
        <div class="col-1"></div>
        <div class="col-5 txt">
            <strong >Ship To :</strong>
        </div>
    </div>

</div>

    <div class="row" style="margin-top: 15px">
        <div class="col-1"></div>
        <div class="col-5">
                    <table>
                        <tr>
                            <p style="font-weight: bold">{{ $orders->supplier->vendor}} </p>
                        </tr>
                        <tr>
                           {{-- <p> Jl. Galuh Mas Raya, Sukaharja,telukjambe Timur, Karawang,Jawa Barat 41361 </p>  --}}
                        </tr>
                    </table>
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr>
                    <p style="font-weight: bold">{{  $orders->location->location_name .'PT Allure Aluminio'}}</p>
                </tr>
                <tr>
                    <p> {{ $orders->alamat_penagihan }}</p>
                </tr>
            </table>
        </div>
    </div>

    <div class="box1" style="margin-top: 40px">
        <div class="row" >
            <div class="col-1"></div>
            <div class="col-5 txt" >
            </div>
            <div class="col-1"></div>
            <div class="col-5 txt">
                <strong >Billing Address :</strong>
            </div>
        </div>
    
    </div>

    <div class="row" style="margin-top: 15px">
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr>
                   <p>Kepada Yth. <br>
                    {{ $orders->nama_supplier}} Di tempat</p>
                   <br>
                   <p>Dengan Hormat, <br>
                    Bersama ini kami order material sebagai berikut:</p>
                </tr>
            </table>      
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            <table>
                <tr>
                    <p style="font-weight: bold">{{  $orders->location->location_name .'PT Allure Aluminio'}}</p>
                </tr>
                <tr>
                   <p> {{ $orders->alamat_penagihan }}</p>
                </tr>
            </table>
        </div>
    </div>
  <br>
  @foreach($purchase as $tipe)
  @if ($loop->first)
  @if ($tipe->type == 'othergood' )
    <table class="table" style="box-shadow: none">
        
        <thead>
            
          <tr style="background-color:#cab9e7;  text-align:center; font-weight:bold">
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
          <tr scope="row" style="text-align: center">
            <th  scope="col">{{ $nomor++ }}</th>
            <td  scope="col">{{ $purchase_requests->item_name }}</td>
            <td  scope="col">{{ $purchase_requests->outstanding }}</td>
            <td  scope="col">{{ $purchase_requests->unit }}</td>
            
          
          @endforeach
        </tbody>
        
      </table>
      @elseif ($tipe->type == 'powder' )
    <table class="table table-bordered" style="box-shadow: none">
        
        <thead>
            
          <tr style="background-color:#cab9e7;  text-align:center; font-weight:bold">
            <td>Suppllier</td>
            <td>Grade</td>
            <td>Warna</td>
            <td>Kode Warna</td>
            <td>Quantity</td>
            <td>m2</td>							
          </tr>
        </thead>
        @php
        $nomor = 1;
        @endphp
        <tbody>
            @foreach ($powders as $purchase_requests)
            
          <tr scope="row" style="text-align: center">
            
            <td scope="col">{{ $purchase_requests->vendor }}</td>
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
      <div class="row" style="margin-top: 60px">
        {{-- <div class="col-1"></div> --}}
        <div class="col-6 border-dark">
            {{-- <div class="card-comment">
                <strong>Comments or Special Intructions</strong>
                <hr style="color: black">
                <p>Harap menyertakan invoice, kwitansi, faktur pajak,dan surat jalan atas nama PT ALLURE ALLUMINIO dengan alamat sesuai NPWP.</p>
            </div> --}}
            <table class="table  table-bordered border-dark" style="border-radius: none; box-shadow:none; border:1px solid black">
                
                  <tr scope="row">
                    <th  scope="col" class="th">Comments or Special Intructions</th>
                  </tr>
                  <tr>
                            <td scope="row" class="td">{{  $orders->note}}
                        <br><br><br><br>
                    </td>
                  </tr>
        
              </table>

        </div>
        <div class="col-2"></div>
        <div class="col-4" style="margin-top: 50px">
            <p>Mengetahui,</p>
            <img src="{{ asset('images/'.$orders->signature) }}" style="width:80px; height:80px">
            <p>{{  $orders->nama}}</p>
        </div>
    </div>
    
<hr style="color: black; height:2p; margin-top: 20px">
<p><span style="color: red">*</span>Note : melampirkan salinan Purchase Order (PO), surat jalan (asli), Invoice (asli), dan materai pada saat penagihan  - Materai Rp. 10,000 untuk transaksi diatas Rp. 5 juta</p>

</div>
<br>
<x-script></x-script>
